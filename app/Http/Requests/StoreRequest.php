<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')],
            'summary' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image',
            'category_id' => ['required',Rule::exists('categories','id')],
            'tags_id.*' => 'exists:tags,id',
        ];
    }
}
