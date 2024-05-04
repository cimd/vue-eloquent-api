<?php

namespace Konnec\Examples\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|numeric',
            //            'title' => 'required|max:60',
            //            'description' => 'required|max:120',
            //            'author_id' => 'required|numeric',
        ];
    }
}
