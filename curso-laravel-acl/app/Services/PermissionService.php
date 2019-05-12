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

    /**
     * Retorna os dados do registro
     *
     * @return object mixed
     */
    public function index()
    {
        return $this->repository->paginate(2);
    }

    /**
     * Retorna os dados do registro
     *
     * @param  integer $id
     * @return object mixed
     */
    public function show($id)
    {
        return $this->repository->findWhereFirst('id', $id);
    }

    /**
     * Faz com que o repositório exclua um determinado registro no banco de dados.
     *
     * @param int $id
     * @return object mixed
     */
    public function delete($id)
    {
        try {
            $this->repository->delete($id);

            return (object) [
                'success' => true,
                'message' => 'Permissão apagada com sucesso.'
            ];

        } catch(\Exception $e) {
            return (object) [
                'success' => false,
                'message' => $e->getMessage(),
                'class' => get_class($e)
            ];
        }
    }

    /**
     * Retorna a quantidade de permissões.
     *
     * @return int
     */
    public function countPermission()
    {
        return count($this->repository->getAll());
    }
}
