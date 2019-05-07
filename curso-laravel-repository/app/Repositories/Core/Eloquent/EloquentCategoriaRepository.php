<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Categoria;
use App\Repositories\Core\BaseEloquentRepository;
use App\Repositories\Contracts\CategoriaRepositoryInterface;

class EloquentCategoriaRepository extends BaseEloquentRepository implements CategoriaRepositoryInterface
{
    public function entity()
    {
        return Categoria::class;
    }

    public function search(object $data)
    {
        return $this->entity->where(function($query) use ($data){//funcao de callback
            if (isset($data->title)) {
                $query = $query->where('title', $data->title);
            }

            if (isset($data->url)) {
                $query = $query->where('url', $data->url);
            }

            if (isset($data->description)) {
                $query = $query->where('description', 'LIKE', "%{$data->description}%");
            }
        })
        ->orderBy('id', 'DESC')
        ->paginate(15);
    }

    //polimorfismo, reescrevendo alguns métodos
    public function store(array $data)
    {
        $data['url'] = kebab_case($data['title']);
        return $this->entity->create($data);
    }

    public function update($id, array $data)
    {
        $data['url'] = kebab_case($data['title']);
        $entity = $this->findById($id);

        return $entity->update($data);
    }
}