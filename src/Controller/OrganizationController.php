<?php
// src/Controller/OrganizationController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Organization;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\OrganizationRepository;

class OrganizationController extends AbstractController
{

  /*#[Route('/projects', name: 'app_project_list')]
  public function listProjects(ProjectRepository $repository): Response
  {
    $projects = $repository->findAll();

    return $this->render('project/list_projects.html.twig', [
      'events' => $events
    ]);
  }*/

  #[Route('/organization/{id}', name: 'app_organization_show', requirements:['id'=> '\d+'])]
  public function showOrganization(Organization $organization): Response
  {
    return $this->render('organization/show_organization.html.twig', [
      'organization' => $organization
    ]);
  }


}
