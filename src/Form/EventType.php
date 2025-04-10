<?php

namespace App\Form;

use App\Entity\Event;
use App\Entity\Organization;
use App\Entity\Project;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
              'label'=>'Name',
              'help'=> 'set the name'
            ])
            ->add('description')
            ->add('publish')
            ->add('prerequisites')
            ->add('startAt', DateType::class)
            ->add('endAt', DateType::class)
            ->add('organization', EntityType::class, [
                'class' => Organization::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('project', EntityType::class, [
                'class' => Project::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
