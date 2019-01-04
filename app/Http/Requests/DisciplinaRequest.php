<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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

        //dd($this->disciplina);
        // Check Create or Update
        if ($this->method() == 'PATCH' || $this->method() == 'PUT') {
            return [
                'curso_id' => 'required',
                'nome' => 'required|max:100|unique:disciplinas,nome,' . $this->disciplina->id,
                'descricao' => 'required|max:255',
            ];
        }else {
            return [
                'curso_id' => 'required',
                'nome' => 'required|max:100|unique:disciplinas,nome',
                'descricao' => 'required|max:255',
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
