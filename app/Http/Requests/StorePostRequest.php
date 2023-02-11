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
            'title' => 'required | string | min:5 | max: 255',
            'sub_title' => 'required | string | min:10 | max:255',
            'body' => 'required | string | min:20 | max:500',
            'published_at' => 'nullable | date',
            'user_id' => 'required | exists:users,id',
            'category_id' => 'required | exists:categories,id'
        ];
    }
}
