<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:125|unique:roles,name',
            'guard_name' => 'nullable|string|max:125',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name',
        ];
    }
}
