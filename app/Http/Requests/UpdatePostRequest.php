<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Salah\LaravelCustomFields\Traits\ValidatesFieldData;

class UpdatePostRequest extends FormRequest
{
    use ValidatesFieldData;

    public function rules(): array
    {
        return $this->withCustomFieldsRules(Post::class, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
