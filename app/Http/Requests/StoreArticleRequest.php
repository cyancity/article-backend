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
            'category' => 'required|min:2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必填',
            'title.min' => '标题最少为2个字符',
            'pid.required' => '上级分类必填',
            'category.required' => '分类必填',
            'category.min' => '分类最少为2个字符',
        ];
    }
}
