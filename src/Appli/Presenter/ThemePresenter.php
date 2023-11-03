<?php

namespace App\Appli\Presenter;

use App\Core\Interface\OutputBoundary;
use App\Core\Interface\OutputData;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ThemePresenter implements OutputBoundary
{
    private SerializerInterface $serializer;

    private response $response;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function error($message):void
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        $response->setContent($message);
        $response->headers->set("content-type", "application/json");
        $this->response = $response;
    }

    public function success($themes):void
    {
        $themeJson = $this->serializer->serialize($themes,"json",["groups"=>["theme"]]);
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set("content-type","application/json");
        $response->setContent($themeJson);
        $this->response = $response;
    }

    public function getResponse(): Response
    {
        return $this->response;
    }



}