<?php

namespace App\Controller;

use App\Entity\Henkilo;
use App\Entity\Kuntopisteet;
use App\Entity\Freezing;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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

    // Kuntopisteet Symfony lomakeharjoitus2
     /**
    * @Route("lomakkeet/kuntopisteet", name="kuntopisteet")
    */
    public function kuntopisteet(Request $request) {
        $kuntopisteet = new Kuntopisteet();
       
        $form = $this->createFormBuilder($kuntopisteet)
            ->setAction($this->generateUrl('kuntopisteet'))
            ->add('Name', null, ['required' => false])
            ->add('Surname', TextType::class)
            ->add('Jogging', TextType::class)
            ->add('Running', TextType::class)
            ->add('Walking', TextType::class)
            ->add('Postingdate', DateType::class)
            ->add('Save', SubmitType::class, ['label' => 'Sent',
            'attr'=>array('class' => 'btn-success mt-3')])
            ->getForm();

            // Tähän tulee lomakkeen käsittely
            $form->handleRequest($request);
            // Painettiinko lähetä painiketta
            if($form->isSubmitted()) {
                // Kyllä, joten käsitellään lomaketiedot
                //var_dump($kuntopisteet->getRunning());
                //Talletetaan lomaketiedot kuntopisteet-olioon
                $kuntopisteet = $form->getdata();
                $run = $kuntopisteet->getRunning();
                $jog = $kuntopisteet->getJogging();
                $walk = $kuntopisteet->getWalking();
                $score = $run * 4 + $jog * 2 + $walk;
                
                // return new Response($kuntopisteet->getName());
                // return new JsonResponse((Array)$kuntopisteet);

                //return $this->redirectToRoute('valmis');

                return $this->render('lomakkeet/naytakuntopisteet.html.twig', [
                    'kuntopisteet' =>$kuntopisteet,
                    'score' => $score,
                ]);

            }
            

        // Luo näkymän, joka näyttää lomakkeen
        return $this->render("lomakkeet\kuntopisteet.html.twig", [
            'form1'=> $form->createView()
        ]);
    }
    // Additional for the Kuntopisteet
    /**
     * @Route("lomakkeet/exit", name="exit")
     */
    public function yourCondition () {
        return new Response("<h1>Done!</h1>");
    }

    // Pakkasasteet Symfony Lomakeharjouitus2
    /**
    * @Route("lomakkeet/freezing", name="freezing")
    */
    public function freezing(Request $request) {
        $freezer = new Freezing();
        $summ = 0;
        $freezDays = 0;
        $average1 = 0;
        $average2 = 0;

        $form = $this->createFormBuilder($freezer)
            ->setAction($this->generateUrl('freezing'))
            ->add('Operative', null, ['required' => false])
            ->add('Week', TextType::class)
            ->add('Monday', TextType::class, [
                'label' => 'Mo',
                'property_path' => 'temperature[monday]',
            ])
            ->add('Thuesday', TextType::class, [
                'label' => 'Tue',
                'property_path' => 'temperature[tuesday]',
            ])
            ->add('Wednesday', TextType::class, [
                'label' => 'We',
                'property_path' => 'temperature[wednesday]',
            ])
            ->add('Thursday', TextType::class, [
                'label' => 'Thu',
                'property_path' => 'temperature[thursday]',
            ])
            ->add('Friday', TextType::class, [
                'label' => 'Fr',
                'property_path' => 'temperature[friday]',
            ])
            ->add('Saturday', TextType::class, [
                'label' => 'Sat',
                'property_path' => 'temperature[saturday]',
            ])
            ->add('Sunday', TextType::class, [
                'label' => 'Su',
                'property_path' => 'temperature[sunday]',
            ])
            ->add('Save', SubmitType::class, ['label' => 'Submit',
            'attr'=>array('class' => 'btn-success mt-3')])
            ->getForm();

            // Tähän tulee lomakkeen käsittely
            $form->handleRequest($request);
            // Painettiinko lähetä painiketta
            if($form->isSubmitted()) {
                // Kyllä, joten käsitellään lomaketiedot
                //var_dump($freezer->getTemperature());
                //Talletetaan lomaketiedot freezing-olioon
                $freezing = $form->getdata();
                $temperature = $freezing->getTemperature();
                foreach ($temperature as $degree) {
                    if ($degree < 0) {
                        $summ += $degree;
                        $freezDays += 1;
                    }
                }
                
                // Lasketaan pakkaspäivien keskiarvo yhdellä desimaalilla
                $average1 = number_format(($summ / $freezDays), 1);
        
                // lasketaan koko viikon keskilämpötilä yhdellä desimaalilla
                $average2 = number_format(array_sum($temperature) / count($temperature),1);
                
                // return new Response($freezer->getOperative());
                // return new JsonResponse((Array)$freezing);

                //return $this->redirectToRoute('valmis');

                return $this->render('lomakkeet/showfreezer.html.twig', [
                    'freezing' =>$freezing,
                    'average1' => $average1,
                    'average2' => $average2,
                ]);

            }
                    

        // Luo näkymän, joka näyttää lomakkeen
        return $this->render("lomakkeet\setfreezer.html.twig", [
            'form1'=> $form->createView()
        ]);
    }
}

?>