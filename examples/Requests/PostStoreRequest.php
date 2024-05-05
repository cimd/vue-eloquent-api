<?php

namespace Konnec\Examples\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:60',
            'description' => 'required|max:255',
            'author_id' => 'required|numeric',
        ];
    }
}
