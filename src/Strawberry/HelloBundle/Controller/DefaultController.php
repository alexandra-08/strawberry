<?php

namespace Strawberry\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Strawberry\HelloBundle\Model\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('StrawberryHelloBundle:Default:index.html.twig', array('name' => 'ALis'));
    }
    
    public function addAction(Request $request)
    {
        
        $user = new User();
     
        $form = $this->createFormBuilder($user)
            ->add('name', 'text')
            ->add('city', 'text')
            ->add('teamid', 'text')
            ->add('gender', 'choice', array(
                                            'choices'   => array('m' => 'Male', 'f' => 'Female'),
                                            'required'  => true,
                                        ))
            ->add('active', 'checkbox', array(
                                            'label'     => 'este activ?',
                                            'required'  => false,
                                        ))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);
   
            if ($form->isValid()) {
               $user->save();
               return $this->render('StrawberryHelloBundle:Default:index.html.twig', array('name' => $user->getName()));
            }
        }
        else
         return $this->render('StrawberryHelloBundle:Default:new.html.twig', array(
                                'form' => $form->createView(),
                            ));
    }   
}
