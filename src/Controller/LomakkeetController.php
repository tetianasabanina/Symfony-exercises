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
            'attr'=>array('class' => 'btn-info mt-3')])
            ->getForm();

        return $this->render("lomakkeet\lomake1.html.twig", [
            'form1'=> $form->createView()
        ]);
    }
}

?>