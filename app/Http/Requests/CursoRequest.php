<?php

namespace App\Http\Requests;

use App\Models\Curso;
use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
                'nome' => 'required|max:100|unique:cursos,nome,' . $this->curso->id,
            ];
        }else{
            return [
                'nome' => 'required|unique:cursos,nome|max:100'
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
