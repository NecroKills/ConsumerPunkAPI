<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeersRequest extends FormRequest
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
      $req = BeersRequest::all();
          return [
            'tipo1' => 'required',
            'tipo2' => 'required',
            'valor' => 'required|max:100',
          ];
    }

    public function messages()
    {
      return [
        'tipo1.required' => 'É obrigatorio selecionar a primeira opção.',
        'tipo2.required'     => 'É obrigatorio selecionar a segunda opção.',
        'valor.required' => 'É obrigatorio informar o valor.',
        ];
    }
}
