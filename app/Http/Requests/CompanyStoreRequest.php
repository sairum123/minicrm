<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class CompanyStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'logo' => 'nullable|dimensions:min_width=100,min_height=100|image|mimes:jpeg,png,jpg,gif,svg'

        ];
    }

    public function messages()
    {
        return [
            'logo.dimensions' => Lang::get('app.logosizevalidate')
        ];
    }
}
