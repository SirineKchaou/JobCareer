<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class Contact2Controller extends AbstractController
{
    #[Route('/contact2', name: 'app_contact2')]
    public function index(Request $request): Response
    {
           dump($request->getMethod());
        if ($request->getMethod()==='POST'){
            if($request->get('name')===''){
                $this->addFlash('error','votre gmail na  pas été envoyé le name est required');
            }
            else{
                $contact2=['name'=>$request->get('name'),
                'email'=>$request->get('email'),
                'message'=>$request->get('message')
            ];
                $this->addFlash('success','votre email a été envoyé avec succés _bon chance_  ');}

        }
        return $this->render('contact2/index.html.twig', [
            
        ]);
    }
}
