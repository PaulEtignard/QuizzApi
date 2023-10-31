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

    public function error():Response
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        $response->headers->set("content-type", "application/json");
        return $response;

    }

    public function success():Response
    {
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set("content-type", "application/json");
        return $response;
    }



    public function getJsonTheme($themes, SerializerInterface $serializer):Response{

        $themeJson = $serializer->serialize($themes,"json",["groups"=>["theme"]]);
        $response = new Response();
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set("content-type","application/json");
        $response->setContent($themeJson);
        return $response;
    }
}