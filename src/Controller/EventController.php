<?php
// src/Controller/EventController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\EventRepository;
use App\Form\EventType;
use Symfony\Component\Form\FormBuilderInterface;

class EventController extends AbstractController
{
    /*#[Route('/event/{name}/{start}/{end}', name: 'app_event_new')]
    public function newEvent(string $name, string $start, string $end, EntityManagerInterface $em): Response
    {
        $event = (new Event())
            ->setName($name)
            ->setDescription('Some generic description')
            ->setAccessible(true)
            ->setStartAt(new \DateTimeImmutable($start))
            ->setEndAt(new \DateTimeImmutable($end))
        ;

        $em->persist($event);
        $em->flush();

        return new Response('Event created');
    }*/

    #[Route('/events', name: 'app_list_events')]
    public function listEvents(EventRepository $repository): Response
    {
      $events = $repository->findAll();

      return $this->render('event/exercise_30.list_events.html.twig', [
        'events' => $events
      ]);
    }

    #[Route('/event/{id}', name: 'app_show_event', requirements:['id'=> '\d+'])]
    public function showEvent(Event $event): Response
    {
      return $this->render('event/exercise_30.show_event.html.twig', [
        'event' => $event
      ]);
    }

    #[Route('/event/create', name: 'app_event_create')]
    public function create(EntityManagerInterface $em): Response
    {
        $event = new Event();
        //$event->setName('Nom sans caractères spéciaux');

        // Use the form factory to create a new form
        $form = $this->createForm(
            EventType::class,    // The form type class
            $event
        );

        /*$em->persist($event);
        $em->flush();*/

        return $this->render('event/new_event.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    #[Route('/event/edit/{id}', name: 'app_event_edit')]
    public function edit(Event $event): Response
    {
        $form = $this->createForm(
          EventType::class,
          $event
        );

    }



}
