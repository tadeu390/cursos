<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => "required|unique:products,name,{$this->segment(3)},id",
            'description'   => 'max:1000',
            'image'         => 'image', //faz com que o campo aceite apenas arquivos que forem imagem
            'category_id'   => 'required|exists:categories,id',
        ];
    }
}
