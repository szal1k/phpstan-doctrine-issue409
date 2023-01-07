<?php

namespace App\Controller;

use App\Repository\SampleRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SampleController extends AbstractController
{
    private SampleRepository $sampleRepository;

    public function __construct(SampleRepository $sampleRepository) {
        $this->sampleRepository = $sampleRepository;
    }

    #[Route('/sample', name: 'app_sample')]
    public function index(): Response
    {
        $sample = $this->sampleRepository->findOneById(1);

        return $this->render('sample/index.html.twig', [
            'controller_name' => 'SampleController',
            'sample' => $sample
        ]);
    }
}
