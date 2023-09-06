<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:8'],
            'description' => ['required'],
            'slug' => ['required','regex:/^[a-z0-9\-]+$/',Rule::unique('properties')->ignore(request()->route()->parameter('property'))],
            'air_layer'=>['required','integer','min:0'],
            'price' => ['required','integer','min:0'],
            'bedroom' => ['required','integer','min:0'],
            'rooms_num' => ['required','integer','min:0'],
            'floor' => ['required','integer','min:0'],
            'address' => ['required'],
            'city' => ['required'],
            'postal_code' => ['required'],
            'sold' => ['required','boolean'],
            'options' => ['required','array','exists:options,id'],
            'images' => ['required','array'],
            'images.*'=> ['required','image','max:2000','mimes:png,jpg']
        ];
    }

    protected function prepareForValidation()
    {
             $this->merge([
                'slug' => $this->input('slug') ?: Str::slug($this->input('title'))
             ]);
    }
}
