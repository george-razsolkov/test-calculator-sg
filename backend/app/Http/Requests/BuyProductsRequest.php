<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'products' => 'required|array',
            'products.*' => 'required|string|exists:products,name'

        ];
    }

    /**
     * @inheritDoc
     */
    protected function prepareForValidation()
    {
        $products =  str_split(strtoupper(str_replace(' ', '', $this->products)));
        $this->replace(['products' => $products]);
    }

}
