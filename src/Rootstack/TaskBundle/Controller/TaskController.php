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
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\View;
use Rootstack\TaskBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class TaskController extends Controller
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
     * * @Get("/task/{id}")
     */
    public function getTaskAction(Task $task){

        return array('task' => $task);

    }


}