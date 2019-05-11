<?php
namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;

class RoleService
{
    /**
     * @var RoleRepositoryInterface
     */
    private $repository;

    /**
     * Carrega as instâncias das dependências desta classe.
     */
    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
