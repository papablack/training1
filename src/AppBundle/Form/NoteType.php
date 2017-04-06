<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * NoteType class.
 *
 * @package AppBundle\Form
 * @author Haracewiat <contact@haracewiat.pl>
 */
class NoteType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->setAction(@$options['action']);

        $builder->add('content', TextType::class, array(
            'required' => !true,
        ));

        $builder->add('submit', SubmitType::class);
        $builder->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) {
            $note = $event->getData();
        });
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Note',
            'action' => 'string',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_note';
    }

}
