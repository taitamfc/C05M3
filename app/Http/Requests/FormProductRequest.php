<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
            'name' => 'required|max:255|unique:products'
        ];
    }

    public function message()
    {
        $messages = [
            'name.required'  => 'Vui lòng nhập vào trường này',
            'max'       => 'Vui lòng nhập dưới 255 ký tự',
        ];
        return $messages;
    }
}
