<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AluguelRequest extends FormRequest
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
            'numeroAluguel' => 'required|min:3',
            'descricaoAluguel' => 'required',
            'valorAluguelMensal' => 'required',
            'valorAluguelDiario' => 'required',
            'multaPorcentagemAtraso' => 'required'
        ];
    }
}
