<?php

namespace App\Infra;
use App\Core\Interface\DataAccessInterface;
use App\Repository\ThemeRepository;
class DataAccess implements DataAccessInterface
{
    private ThemeRepository $repository;

    /**
     * @param ThemeRepository $repository
     */
    public function __construct(ThemeRepository $repository)
    {
        $this->repository = $repository;
    }
    function getAllThemes(): array
    {
        return $this->repository->findAll();
    }
}
