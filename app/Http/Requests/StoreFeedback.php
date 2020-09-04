<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedback extends FormRequest
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
            'surname' => 'required|min:2|max:50',
            'name' => 'required|min:2|max:50',
            'patronymic' => 'required|min:2|max:50',
            'email' => 'required|email',
            'telephone_number' => 'required',
            'topic_id' => 'required|numeric',
            'content' => 'required',
        ];
    }
}
