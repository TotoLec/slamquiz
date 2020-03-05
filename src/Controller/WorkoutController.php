<?php

namespace App\Controller;

use App\Entity\Quiz;
use App\Form\QuizType;
use App\Entity\Workout;
use App\Form\WorkoutType;
use App\Repository\QuizRepository;
use App\Repository\WorkoutRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
Use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/workout")
 */
class WorkoutController extends AbstractController
{
    /**
     * @Route("/", name="workout_index", methods={"GET"})
     */
    public function index(WorkoutRepository $workoutRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('workout/index.html.twig', [
            'workouts' => $workoutRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/new", name="workout_new", methods={"GET","POST"})
     */
    public function new(QuizRepository $qr, Request $request, int $id, EntityManagerInterface $em): Response
    {
        $quiz = $qr->findOneById($id);

        $form = $this->createForm(QuizType::class, $quiz, ['form_type' => 'student']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($quiz);
            $em->flush();

            return $this->redirectToRoute('workout_index');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('workout/new.html.twig', [
            'quiz' => $quiz,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workout_show", methods={"GET"})
     */
    public function show(Workout $workout): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('workout/show.html.twig', [
            'workout' => $workout,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="workout_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Workout $workout): Response
    {
        $form = $this->createForm(WorkoutType::class, $workout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('workout_index');
        }

        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('workout/edit.html.twig', [
            'workout' => $workout,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="workout_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Workout $workout): Response
    {
        if ($this->isCsrfTokenValid('delete'.$workout->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($workout);
            $entityManager->flush();
        }
        
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->redirectToRoute('workout_index');
    }
}
