<?php

namespace App\Core\Interface;

use Symfony\Component\Serializer\SerializerInterface;

interface OutputBoundary
{
    function getJsonTheme($themes, SerializerInterface $serializer);

}