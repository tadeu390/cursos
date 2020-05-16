<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\PropertyTableNotExists;
//use DB;
use IIluminate\Database\DatabaseManager as DB;

class BaseQueryBuilderRepository implements RepositoryInterface
{
    protected $tb, $oderBy = ['column' => 'id', 'order' => 'DESC'], $db;

    public function __construct(DB $db)
    {
        $this->tb = $this->resolveTable();
        $this->db = $db;
    }

    public function getAll()
    {
        return $this->db
                    ->table($this->tb)
                    ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                    ->get();
    }

    public function findById($id)
    {
        return $this->db->table($this->tb)->find($id);
    }

    public function findWhere($column, $value)
    {
        return $this->db
                    ->table($this->tb)
                    ->where($column, $value)
                    ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                    ->get();
    }

    public function findWhereFirst($column, $value)
    {
        return $this->db->table($this->tb)-where($column, $value)->first();
    }

    public function paginate($totalPage = 10)
    {
        return $this->db
                    ->table($this->tb)
                    ->orderBy($this->orderBy['column'], $this->orderBy['order'])
                    ->paginate($totalPage);
    }

    public function store(array $data)
    {
        return $this->db->table($this->tb)->insert($data);
    }

    public function update($id, array $data)
    {
        return $this->db->table($this->tb)->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->db->table($this->tb)->where('id', $id)->delete();
    }

    public function orderBy($column, $order = 'DESC')
    {
        $this->orderBy = [
            'column' => $column,
            'order' => $order
        ];

        return $this;
    }

    public function resolveTable()
    {
        if (!property_exists($this, 'table')) {
            throw new PropertyTableNotExists;
        }

        return $this->table;
    }
}