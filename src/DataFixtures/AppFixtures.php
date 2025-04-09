<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Project;
use App\Entity\Event;
use App\Entity\Organization;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $project = new Project();
        $project->setName('mon projet');
        $project->setSummary('resume du projet');
        $project->setCreatedAt(new \DateTimeImmutable());
        $project->setUpdatedAt(new \DateTimeImmutable());
        $manager->persist($project);

        $organization = new Organization();
        $organization->setName('Mon organisation');
        $organization->setPresentation('presentation de mon organisation');
        $organization->setCreatedAt(new \DateTimeImmutable());
        $manager->persist($organization);

        for ($i = 1; $i <= 10; $i++) {
          $event = new Event();
          $event->setName('mon evenement '.$i);
          $event->setDescription('description de mon evenement');
          $event->setPublish(1);
          $event->setPrerequisites('prerequis de mon evenement');
          $event->setStartAt(new \DateTimeImmutable());
          $event->setEndAt(new \DateTimeImmutable('+1day'));

          $organization->addEvent($event);
          $project->addEvent($event);

          $manager->persist($event);
        }



        $manager->flush();
    }
}
