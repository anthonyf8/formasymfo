<?php
// src/Controller/ProjectController.php
namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\ProjectRepository;

class ProjectController extends AbstractController
{

  #[Route('/projects', name: 'app_project_list')]
  public function listProjects(ProjectRepository $repository): Response
  {
    $projects = $repository->findAll();

    return $this->render('project/list_projects.html.twig', [
      'projects' => $projects
    ]);
  }

  #[Route('/project/{id}', name: 'app_project_show', requirements:['id'=> '\d+'])]
  public function showProject(Project $project): Response
  {
    return $this->render('project/show_project.html.twig', [
      'project' => $project
    ]);
  }


}
