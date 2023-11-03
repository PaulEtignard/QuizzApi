<?php

namespace App\Controller;


use App\Appli\Presenter\ThemePresenter;
use App\Core\Interactor\ThemeInteractor;
use App\Core\Interface\OutputBoundary;
use App\Infra\DataAccess;
use App\Repository\ThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;


class ApiController extends AbstractController
{
    private DataAccess $dataAccess;
    private ThemeInteractor $themeInteractor;
    private OutputBoundary $outputBoundary;
    private ThemePresenter $ThemePresenter;
    private ThemeRepository $themeRepository;
    #[Route('/api/themes', name: 'app_api_themes')]
    public function GetAllthemes(DataAccess $dataAccess, SerializerInterface $serializer): Response
    {
        $presenter = new ThemePresenter($serializer);
        $themeInteractor = new ThemeInteractor($dataAccess, $presenter);
        $themeInteractor->execute();
        return $presenter->getResponse();
    }
}
