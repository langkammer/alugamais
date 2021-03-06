<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaturaRequest extends FormRequest
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
            'mesRef' => 'required',
            'dataEmissao' => 'required',
            'periodoFaturaIni' => 'required',
            'periodoFaturaFinal' => 'required',
            'dataVencimento' => 'required',
            'valorTotal' => 'required',
            'contas_id' => 'required',
            'contrato_id' => 'required'
        ];
    }
}
