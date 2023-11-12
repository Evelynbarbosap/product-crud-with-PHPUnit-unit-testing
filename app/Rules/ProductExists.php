<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Product;

class ProductExists implements Rule
{
    public function passes($attribute, $value)
    {
        // Verifica se o produto existe no banco de dados
        return Product::where('id', $value)->exists();

    }

    public function message()
    {
        return 'O produto selecionado não existe.';
    }
}
