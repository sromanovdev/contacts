<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MapFieldsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fields' => 'required|array'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            if (! in_array('team_id', $this->input('fields'))) {
                $validator->errors()->add('fields', 'Team Id field must set');
            }
            if (! in_array('phone', $this->input('fields'))) {
                $validator->errors()->add('fields', 'Phone is field must set');
            }
        });
    }
}
