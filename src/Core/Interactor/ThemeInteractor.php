<?php

namespace App\Core\Interactor;



use App\Appli\Presenter\ThemePresenter;
use App\Core\Interface\DataAccessInterface;
use App\Core\Interface\InputBounary;
use App\Core\Interface\OutputBoundary;
use App\Infra\DataAccess;
use PHPUnit\Util\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class ThemeInteractor implements InputBounary
{


    private DataAccessInterface $dataAccessInterface;

    private OutputBoundary $outputBoundary;



    /**
     * @param DataAccessInterface $dataAccessInterface
     */
    public function __construct(DataAccessInterface $dataAccessInterface,OutputBoundary $outputBoundary )
    {
        $this->dataAccessInterface = $dataAccessInterface;
        $this->outputBoundary = $outputBoundary;
    }

    public function execute():void
    {
        $outputBoundary = $this->outputBoundary;
        try {
           $this->dataAccessInterface->getAllThemes();

        } catch (Exception $e) {
            $outputBoundary->error($e);
        }
        $outputBoundary->success($this->dataAccessInterface->getAllThemes());
    }

}