<?php
declare(strict_types=1);

namespace Controller;

abstract class AbstractController
{
    abstract public function index(): array;

    public function getRequest()
    {

    }
}
