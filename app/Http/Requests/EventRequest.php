<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:3',
            'start' => 'date_format:Y-m-d H:i:s|before:end',
            'end' => 'date_format:Y-m-d H:i:s|after:start',
            'funcid' => 'required',
        ];
    }

    public function messages()
    {
        return[
          'title.required' => 'Preencha o campo Titulo!',
          'funcid.required' => 'Preencha o campo Id Funcionario!',
          'title.min' => 'Titulo necessita de pelo menos 3 caracters!',
          'start.date_format' => 'Preencha uma data Inicial com valor valido!',
          'start.before' => 'A data Inicial deve ser menor que a data Final!',
          'end.date_format' => 'Preencha uma data Final com valor valido!',
          'end.after' => 'A data Final deve ser maior que a data Inicial!',
        ];
    }
}
