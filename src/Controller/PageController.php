<?php

namespace App\Controller;

use App\Entity\Concour;
use App\Form\ConcourType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PageController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function index(): Response
    {
        return $this->render('page/index.html.twig');
    }
    
    /**
     * @Route("/comment", name="app_comment")
     */
    public function CommentCaMarche(): Response
    {
        return $this->render('page/comment.html.twig');
    }

    /**
     * @Route("/concours", name="app_concours")
     */
    public function ConcoursDuMoment(Request $request,EntityManagerInterface $entityManager , SluggerInterface $slugger): Response
    {
        $repo = $this->getDoctrine()->getRepository(Concour::class);
        $concours= $repo->findAll();
        // dd($concours);
        $concour = new Concour();
        $form = $this->createForm(ConcourType::class, $concour);
        $form->handleRequest($request);
        
        

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['uplaod']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads';

            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $safeFileName = $slugger->slug($originalFilename);
            $newFilename = $safeFileName.'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $concour->setUplaod($newFilename);

            
            $entityManager->persist($concour);
            $entityManager->flush();

            return $this->redirectToRoute('app_concours');

        }


        return $this->render('page/concoursDuMoment.html.twig',[
            'form'=> $form->createView(),
            'concours'=> $concours,

        ]);
    }

    /**
     * @Route("/mentionslegales", name="app_mentionslegales")
     */
    public function MentionsLegales(): Response
    {
        return $this->render('page/mentionslegales.html.twig');
    }
}

