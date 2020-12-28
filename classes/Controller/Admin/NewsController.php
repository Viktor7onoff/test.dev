<?php
declare(strict_types=1);

namespace Controller\Admin;

use Controller\AbstractController;
use Model\News;
use Repository\NewsRepository;

class NewsController extends AbstractController
{
    private NewsRepository $repo;

    public function index(): array
    {
        return  $this->repo->setModel(News::create())->getAll();
    }

    public function create(): array
    {
        return  $this->repo->setModel(News::create())->getAll();
    }


    public function view(): array
    {
        return  $this->repo->setModel(News::create())->getAll();
    }

    public function update(): array
    {
        $data = $this->getRequest();
        return  $this->repo->setModel(News::create())->getAll();
    }
}
