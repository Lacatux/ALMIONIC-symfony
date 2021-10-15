<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlmiController extends AbstractController
{
    /**
     * @Route("/almi", name="almi")
     */
    public function index()
    {
        $parametros = array('titulo' => 'Almi symfony');
        //Carga de datos
        $datos = $this->getDoctrine()->getRepository(Usuario::class)->findAll();
        $parametros['Usuarios'] = $datos;

        return $this->render('almi/index.html.twig', [
            'controller_name' => 'AlmiController',
        ]);
    }
}
