<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        // Check Create or Update
        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            return [
                'nome' => 'required|max:100|unique:tags,nome,' . $this->tag->id,
            ];
        }else{
            return [
                'nome' => 'required|unique:tags,nome|max:100'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => "<span class='text-danger'><i class='fa fa-times-circle'></i> Esse campo é obrigatório!</span>",
            'unique' => "<span class='text-danger'><i class='fa fa-times-circle'></i> Nome já cadastrado!</span>",
            'max' => "<span class='text-danger'><i class='fa fa-times-circle'></i> Digite no máximo :max caracteres!</span>",
        ];
    }
}
