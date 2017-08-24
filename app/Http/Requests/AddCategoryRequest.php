<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => 'required|min:2',
            'pid' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '分类名必填',
            'title.min' => '分类名最少为2个字符',
            'pid.required' => '上级分类必填',
        ];
    }
}
