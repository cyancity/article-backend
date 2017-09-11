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
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '标题必填',
            'content.required' => '内容必填',
            'category.required' => '分类必填',
        ];
    }
}
