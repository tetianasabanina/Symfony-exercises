<?php

namespace App\Controller;

use App\Entity\Linkki;
use App\Form\LinkkiFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LinkkiController extends AbstractController {
    /**
     * @Route("/linkki", name="linkki_lista")
     */

     public function index() {
        // Hakee kaikki linkit tietokannasta
        $linkit = $this->getDoctrine()->getRepository(Linkki::class)->findAll();


        // Pyydetään näkymää näytämään kaikki linkit
        return $this->render('linkki/index.html.twig', [
            'linkit' => $linkit,
        ]);
            
    }       

    /**
     * @Route("/linkki/uusi", name="linkki_uusi")
     */

    public function uusi(Request $request) {
        $linkki = new Linkki();

        //Luodaan lomake 
        $form = $this->createForm(
            LinkkiFormType::class,
            $linkki, [
                'action'    => $this->generateUrl('linkki_uusi'),
                'attr'      => ['class' => 'form-signin']
            ]
        );

        //Käsitellän lomakeetta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if($form->isSubmitted()){
            //Talletetaan lomaketiedot muuttujaan
            $linkki = $form->getData();

            //Telletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($linkki);
            $entityManager->flush();

            //Kutsutaan index-kontrolleria
            return $this->redirectToRoute('linkki_lista');
        }

        //Pyydetään näkymää näytämään lomake
        return $this->render('linkki/uusi.html.twig', [
            'form1' => $form->createView()
        ]);
    }
    

    /**
     * @Route("/linkki/nayta/{id}", name="linkki_nayta")
     */

    public function nayta($id) {
        $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);


        return $this->render('linkki/nayta.html.twig', [
            'linkki' => $linkki,
        ]);
    }
    

    /**
     * @Route("/linkki/muokkaa/{id}", name="linkki_muokkaa")
     */

    public function muokkaa(Request $request, $id) {
       
        $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);

        //Luodaan lomake 
        $form = $this->createForm(
            LinkkiFormType::class,
            $linkki, [
                'attr'      => ['class' => 'form-signin']
            ]
        );

        //Käsitellän lomakeetta tulleet tiedot ja talletetaan tietokantaan
        $form->handleRequest($request);
        if($form->isSubmitted()){
            //Talletetaan lomaketiedot muuttujaan
            $linkki = $form->getData();

            //Telletetaan tietokantaan
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            //Kutsutaan index-kontrolleria
            return $this->redirectToRoute('linkki_lista');
        }

        return $this->render('linkki/muokkaa.html.twig', [
            'form1' => $form->createView()
        ]);
    }
    

    /**
     * @Route("/linkki/poista/{id}", name="linkki_poista")
     */

    public function poista(Request $request, $id) {
        $linkki = $this->getDoctrine()->getRepository(Linkki::class)->find($id);

         //Poistetaan linkki tietokannasta
         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->remove($linkki);
         $entityManager->flush();

        //return $this->render('linkki/poista.html.twig');
        return $this->redirectToRoute('linkki_lista');

    }
    

}

?>