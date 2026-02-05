<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Salah\LaravelCustomFields\Traits\ValidatesFieldData;

class StoreProductRequest extends FormRequest
{
    use ValidatesFieldData;

    public function rules(): array
    {
        return $this->withCustomFieldsRules(Product::class, [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }
}
