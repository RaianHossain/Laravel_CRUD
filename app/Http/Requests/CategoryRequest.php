<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        // dd($this->route('category')->id);

        $categoryId = $this->route('category')->id?? '';

        return [
            'title' => 'required|min:3|max:50|unique:categories,title,'.$categoryId,
            'description' => ['required', 'min:10'],
            // 'image' => 'required'
        ];
    }
}
