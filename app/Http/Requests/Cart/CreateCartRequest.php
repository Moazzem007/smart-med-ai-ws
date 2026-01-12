<?php

namespace App\Http\Requests\Cart;

use Illuminate\Foundation\Http\FormRequest;

class CreateCartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required'],
			'status' => ['required', 'string'],
			'subtotal' => ['required'],
			'discount' => ['required'],
			'tax' => ['required'],
			'grand_total' => ['required'],
        ];
    }
}
