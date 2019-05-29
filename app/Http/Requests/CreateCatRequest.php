<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatRequest extends FormRequest
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
            'name' => 'required|min:3|max:10',
            'age' => 'required_if:name,abc',
            'breed_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'bắt buộc nhập',
            'name.min' => 'it nhất 3 kí tự',
            'age.required_if' => 'bắt buộc nhập nếu name là abc'
        ];
    }
}
