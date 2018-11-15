<?php
namespace App\Controller;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController
{
    /**
     * @var Environment
     */
    private $twig;
    public function __construct($twig)
    {
        $this->twig=$twig;
    }

    /**
     * @param PropertyRepository $repository
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    public function index(PropertyRepository $repository):Response
    {
        $properties = $repository->findLastest();
        return new Response($this->twig->render('pages/home.html.twig',['properties' => $properties]));
    }
}