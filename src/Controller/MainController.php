<?php
// src/Controller/MainController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route(path:'/', name:'app_index')]
    public function index(Request $request): Response
    {
      $name = $request->query->getAlpha('name', default:'World');
      return $this->render('main/index.html.twig', [
          'name' => $name,
      ]);
    }


}
