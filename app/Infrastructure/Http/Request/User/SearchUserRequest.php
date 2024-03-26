<?php

namespace App\Infrastructure\Http\Request\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required_without_all:name,email|integer',
            'name' => 'required_without_all:id,email|min:3|max:255',
            'email' => 'required_without_all:id,name|email',
        ];
    }
}
