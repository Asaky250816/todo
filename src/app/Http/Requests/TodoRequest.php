<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => ['required', 'string', 'max:20'],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Todoを入力してください。',
            'content.string' => 'Todoは文字列で入力してください。',
            'content.max' => 'Todoは20文字以内で入力してください。',
            'category_id.required' => 'カテゴリを選択してください。',
            'category_id.exists' => '選択されたカテゴリは存在しません。',
        ];
    }
}
