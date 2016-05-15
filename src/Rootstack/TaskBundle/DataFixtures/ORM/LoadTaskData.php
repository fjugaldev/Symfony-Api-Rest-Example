<?php
/**
 * Created by PhpStorm.
 * User: fjugalde
 * Date: 5/15/16
 * Time: 1:28 PM
 */

namespace Rootstack\TaskBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Rootstack\TaskBundle\Entity\Task;

class LoadTaskData implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {

        $task1 = new Task();
        $task1->setTitle("Task 1");
        $task1->setDescription("Description for the task 1");

        $task2 = new Task();
        $task2->setTitle("Task 2");
        $task2->setDescription("Description for the task 2");

        $task3 = new Task();
        $task3->setTitle("Task 3");
        $task3->setDescription("Description for the task 3");

        $manager->persist($task1);
        $manager->persist($task2);
        $manager->persist($task3);

        $manager->flush();

    }

}