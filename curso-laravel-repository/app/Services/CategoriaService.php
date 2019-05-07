<?php 

namespace App\Services;

use App\Repositories\Contracts\CategoriaRepositoryInterface;

class CategoriaService
{
    protected $repository;

    public function __construct(CategoriaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function get()
    {
        return $this->repository->getAll();
    }

    public function index()
    {
        return $this->repository->paginate();
    }

    public function store($data)
    {
        return $this->repository->store($data);
    }

    public function show($id)
    {
        return $this->repository->findById($id);
    }

    public function edit($id)
    {
        return $this->repository->findById($id);
    }

    public function update($id, $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function search($data)
    {
        return $this->repository->search((object) $data);
    }
}