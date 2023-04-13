<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdatePost extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->segment(2);
        $rules = [
            'title' => ['required','min:3','max:160', Rule::unique('posts')->ignore($id)],
            'image' => ['required','image'],
            'content' => ['nullable','min:5','max:10000'],
        ];
        if ($this->method() == 'PUT'){
            $rules['image'] = ['nullable','image'];
        }

        return $rules;
    }
}
