<?php

namespace App\Controller;

use App\Entity\OrangeChef;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/", name="to_do_list")
     * @return Response
     */
    public function index(): Response
    {
        $tasks = $this->getDoctrine()->getRepository(OrangeChef::class)->findBy([],['id'=>'DESC']);
        return $this->render('index.html.twig',['tasks'=>$tasks]);
    }

    /**
     * @Route("create-task", name="create_task")
     */
    public function create(Request $request)
    {
        $title = trim($request->request->get('title'));
        if (empty($title))
        return $this->redirectToRoute('to_do_list');

        $entityManager = $this->getDoctrine()->getManager();

        $orange_cheif = new OrangeChef();

        $orange_cheif->setTitle($title);

        $entityManager->persist($orange_cheif);
        $entityManager->flush();

        return $this->redirectToRoute('to_do_list');

        }

    /**
     * @Route("/switch-status/{id}", name="switch_status")
     */
    public function switchStatus($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(OrangeChef::class)->find($id);

        $task->setStatus( ! $task->getStatus() );
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');
    }

    /**
     * @Route("/delete/{id}", name="task_delete")
     */
    public function delete(OrangeChef $id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($id);
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');
    }
}