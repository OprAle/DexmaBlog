<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required | max:255 | min:5 | string',
            'sub_title' => 'required | max:65535 | min:10 |  string',
            'body' => 'required | min:20 | string',
            'published_at' => 'nullable | date',
            'category_id' => 'required | exists:categories,id',
            'user_id' => 'required | exists:users,id',
        ];
    }
}
