<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtigoRequest extends FormRequest
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
                'disciplina_id' => 'required',
                'titulo' => 'required|max:150|unique:artigos,titulo,' . $this->artigo->id,
                'subtitulo' => 'max:255',
                'conteudo' => 'required'
            ];
        }else {
            return [
                'disciplina_id' => 'required',
                'titulo' => 'required|max:150|unique:artigos,titulo',
                'subtitulo' => 'max:255',
                'conteudo' => 'required',
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
