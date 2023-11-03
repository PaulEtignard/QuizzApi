<?php

namespace App\Core\Interface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

interface OutputBoundary
{
    function success($message):void;
    function error($message):void;
}