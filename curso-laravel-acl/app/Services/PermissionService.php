<?php
namespace App\Services;

use App\Repositories\Contracts\PermissionRepositoryInterface;

class PermissionService
{
    /**
     * @var PermissionRepositoryInterface
     */
    private $repository;

    /**
     * Carrega as instâncias das dependências desta classe.
     */
    public function __construct(PermissionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
