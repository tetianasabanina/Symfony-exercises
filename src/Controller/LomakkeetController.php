<?php

namespace App\Controller;

use App\Entity\Henkilo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\JsonResponse;

class LomakkeetController extends AbstractController {

    /**
    * @Route("lomakkeet/lomake1", name="omalomake")
    */
    public function lomake1(Request $request) {
        $henkilo = new Henkilo();
        $henkilo->setEmail("admin@bc.fi");

        $form = $this->createFormBuilder($henkilo)
            ->setAction($this->generateUrl('omalomake'))
            ->add('Etunimi', null, ['required' => false])
            ->add('Sukunimi', TextType::class)
            ->add('Email', TextType::class)
            ->add('Kirjauspvm', DateType::class)
            ->add('Save', SubmitType::class, ['label' => 'Talenna',
            'attr'=>array('class' => 'btn-success mt-3')])
            ->getForm();

            // Tähän tulee lomakkeen käsittely
            $form->handleRequest($request);
            // Painettiinko lähetä painiketta
            if($form->isSubmitted()) {
                // Kyllä, joten käsitellään lomaketiedot
                //var_dump($henkilo);
                //Talletetaan lomaketiedot henkilo-olioon
                $henkilo = $form->getdata();

                // return new Response($henkilo->getEtunimi());
                // return new JsonResponse((Array)$henkilo);

                //return $this->redirectToRoute('valmis');
                
                return $this->render('lomakkeet/naytalomake1.html.twig', [
                    'henkilo' =>$henkilo,
                ]);

            }

        // Luo näkymän, joka näyttää lomakkeen
        return $this->render("lomakkeet\lomake1.html.twig", [
            'form1'=> $form->createView()
        ]);
    }

    /**
     * @Route("lomakkeet/valmis", name="valmis")
     */

    public function tehtavaValmis() {
        return new Response("<h1>Valmista</h1>");
    }

}

?>