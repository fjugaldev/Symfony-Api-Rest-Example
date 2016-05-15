<?php
/**
 * Created by PhpStorm.
 * User: fjugalde
 * Date: 5/15/16
 * Time: 4:48 PM
 */

namespace Rootstack\TaskBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults(
            [
                'csrf_protection' => false,
                'data_class' => 'Rootstack\TaskBundle\Entity\Task',
            ]
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return "";
    }


}