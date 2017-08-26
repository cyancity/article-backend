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
            'title' => 'required|min:2|max:60',
            'content' => 'required|min:30',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必填',
            'title.min' => '标题最少为2个字符',
            'title.max' => '标题最多为60个字符',
            'content.required' => '内容必填',
            'content.min' => '内容最少为30个字符',
            'category.required' => '分类必填',
        ];
    }
}
