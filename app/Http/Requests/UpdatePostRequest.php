<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'title_en' => 'required', 'max:255', Rule::unique('posts')->ignore($this->post->title_en),
            'title_fr' => 'required', 'max:255', Rule::unique('posts')->ignore($this->post->title_fr),
            'body_en' => 'required|max:1000',
            'body_fr' => 'required|max:1000',
            'category_id' => 'required|numeric',
            'photo' => 'image|mimes:png,jpg,jpeg|max:10048',
        ];
    }
}
