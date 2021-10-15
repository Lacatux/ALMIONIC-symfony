<?php

namespace App\Controller;

use App\Entity\Curso;
use App\Entity\Usuario;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class WsAlmiController extends AbstractController
{
    /**
     * @Route("/ws/almi/login", name="ws_post_login", methods={"POST"})
     */
    public function getLogin (Request $request):JsonResponse
    {
        $data = json_decode($request->getContent());
        $user = $data->user;
        $pwd = $data->pwd;


        if ($user == null || $pwd == null) {
            return new JsonResponse(['error' => 'Faltan datos'], Response::HTTP_NOT_ACCEPTABLE);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $usuario = $entityManager->getRepository(Usuario::class)->findOneBy(['user' => $user]);
        //Validacion
        if ($user == $usuario->getUser() && $pwd == $usuario->getPwd()) {
            return $this->convertToJson($usuario);
        } else {
            return new JsonResponse(['error' => 'Datos invalidos'], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * @Route ("/ws/almi/cursos", name="ws_get_cursos", methods={"GET"})
     */
    public function getAllCursos():JsonResponse {
        $entityManager = $this->getDoctrine()->getManager();
        $alumnado = $entityManager->getRepository(Curso::class)->findAll();
        $json = $this->convertToJson($alumnado);

        return $json;
    }

    private function convertToJson($object):JsonResponse
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new DateTimeNormalizer(), new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $normalized = $serializer->normalize($object, null, array(DateTimeNormalizer::FORMAT_KEY => 'Y/m/d'));
        $jsonContent = $serializer->serialize($normalized, 'json');

        return JsonResponse::fromJsonString($jsonContent, 200);
    }

}
