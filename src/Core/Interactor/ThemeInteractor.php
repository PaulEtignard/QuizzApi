<?php

namespace App\Core\Interactor;



use App\Core\Interface\DataAccessInterface;
use App\Core\Interface\OutputBoundary;
use App\Infra\DataAccess;
use PHPUnit\Util\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ThemeInteractor
{


    private DataAccessInterface $dataAccess;
    private OutputBoundary $outputBoundary;
    private SerializerInterface $serializer;

    private Response $response;

    /**
     * @param DataAccessInterface $dataAccess
     */
    public function __construct(DataAccessInterface $dataAccess, OutputBoundary $outputBoundary, SerializerInterface $serializer)
    {
        $this->dataAccess = $dataAccess;
        $this->outputBoundary = $outputBoundary;
        $this->serializer = $serializer;
    }

    public function execute():Response
    {
            return  $this->outputBoundary->getJsonTheme($this->dataAccess->getAllThemes(), $this->serializer);
    }

}