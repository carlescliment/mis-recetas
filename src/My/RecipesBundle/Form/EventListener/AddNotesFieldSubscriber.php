<?php
// src/My/RecipesBundle/Form/EventListener/AddNotesFieldSubscriber.php
namespace My\RecipesBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddNotesFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $recipe = $event->getData();
        $form = $event->getForm();

        if ($recipe && $recipe->isHard()) {
            $form->add('notes', 'textarea', array('required' => false));
        }
    }
}