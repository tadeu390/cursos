<?php

namespace App\Repositories\Core\QueryBuilder;

use App\Models\Categoria;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class QueryBuilderCategoriaRepository extends BaseQueryBuilderRepository implements CategoriaRepositoryInterface
{
    protected $table = 'categorias';

    public function store(array $data)
    {
        $data['url'] = kebab_case($data['title']);
        return $this->db->table($this->tb)->insert($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['title']);
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }
}