<?php
// src/Controller/ContactController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route(path:'/contact', name:'app_contact')]
    public function contact(Request $request): Response
    {
      //return new Response('Page de contact');
      return $this->render('main/contact.html.twig');
    }


}
