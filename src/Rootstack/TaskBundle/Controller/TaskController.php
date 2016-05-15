<?php
/**
 * Created by PhpStorm.
 * User: fjugalde
 * Date: 5/15/16
 * Time: 1:57 PM
 */

namespace Rootstack\TaskBundle\Controller;


use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Rootstack\TaskBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Rootstack\TaskBundle\Form\Type\TaskType;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

class TaskController extends FOSRestController
{

    /**
     * @return array
     *
     * @View()
     * @Get("/tasks")
     */
    public function getTasksAction(){

        $tasks = $this->getDoctrine()->getRepository("RootstackTaskBundle:Task")
            ->findAll();

        return array('tasks' => $tasks);
    }

    /**
     * @param Task $task
     * @return array
     *
     * @View()
     * @ParamConverter("task", class="RootstackTaskBundle:Task")
     * @Get("/task/{id}",)
     */
    public function getTaskAction(Task $task){

        return array('task' => $task);

    }

    /**
     * @var Request $request
     * @return View|array
     *
     * @View()
     * @Post("/task")
     */
    public function postTaskAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return array("task" => $task);

        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Put action
     * @var Request $request
     * @var Task $task
     * @return array
     *
     * @View()
     * @ParamConverter("task", class="RootstackTaskBundle:Task")
     * @Put("/task/{id}")
     */
    public function putTaskAction(Request $request, Task $task)
    {

        $form = $this->createForm(new TaskType(), $task);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($task);
            $em->flush();

//            return $this->view(null, Codes::HTTP_NO_CONTENT);
            return array("task" => $task);
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Delete action
     * @var Task $task
     * @return array
     *
     * @View()
     * @ParamConverter("task", class="RootstackTaskBundle:Task")
     * @Delete("/task/{id}")
     */
    public function deleteTaskAction(Task $task)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($task);
        $em->flush();

        return array("status" => "Deleted");
    }

//
//    /**
//     * @param Task $task
//     * @return array
//     *
//     * @View()
//     * * @Post("/task")
//     */
//    public function postTaskAction(Request $request)
//    {
//        //TODO: there's a simpler method using FOSRestBundle body converter
//        // that's the reason why we need to be able to create
//        // an task without body or title, to use it as
//        // a placeholder for the form
//        $task = new Task();
//        // createForm is provided by the parent class
//        $form = $this->createForm(
//            new TaskType(),
//            $task
//        );
//        // this method is the one that will use the value in the POST
//        // to update $task
//        $form->handleRequest($request);
//
//        // we use it like that instead of the standard $form->isValid()
//        // because the json generated
//        // is much readable than the one by serializing $form->getErrors()
//        $errors = $this->get('validator')->validate($task);
//
//        if (count($errors) > 0) {
//            return new View(
//                array($errors),
//                Response::HTTP_UNPROCESSABLE_ENTITY
//            );
//        }
//        $manager = $this->getDoctrine()->getManager();
//        $manager->persist($task);
//        $manager->flush();
//        // created => 201
//        return new View(array($task), Response::HTTP_CREATED);
//    }


}