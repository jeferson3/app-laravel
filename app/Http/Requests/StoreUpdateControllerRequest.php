<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateControllerRequest extends FormRequest
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
    public function rules() //todas as validações
    {
        ///url - product/id
        //seguimento 1 - product
        //seguimento 2 - id
        $id =  $this->segment(2); //recuperando o id na url, para quando o metodo for update, elea diciona uma execeção para a validação de atributo name unique;
        // unique:products, name, {$id}, id"
        return [
            'name' => ['required', 'min:2', 'max:200', Rule::unique('products')->ignore($id)], //ignore a validação unique, quando vai atualizar dados, pra nao ocorrer erro de nome ja existe,
            'price' => ['required', 'regex:/^\d+(\.\d{2})?$/'],
            'description' => ['required', 'min:10', 'max:10000'],
            'image' => ['nullable', 'image'],
        ];
    }

    public function messages() //personalizar mensagem
    {
        return [
            //'campo' => 'mensagem',
            // 'name.required' => 'o nome é obriatorio!',
            // 'name.min' => 'o nome deve ter no mínimo 3 caracteres!',
            // 'description.required' => 'a descrição é obriatoria!',
            // 'description.min' => 'a descrição deve ter no mínimo 10 caracteres!',
            // 'photo.required' => 'a foto é obriatoria!',
            // 'photo.image' => 'a foto deve ser do tipo image!',
        ];
    }
}
