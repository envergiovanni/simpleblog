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
        $rules = [
            'title'         =>  'required',
            'slug'          =>  ['required', Rule::unique('posts')->ignore($this->route('post')->id)],
            'subtitle'      =>  'required',
            'user_id'       =>  'required|integer',
            'category_id'   =>  'required|integer',
            'excerpt'       =>  'required',
            'content'       =>  'required'
        ];

        if ($this->get('image_path')) {
            $rules = array_merge($rules, ['image_path' => 'mimes:jpg,jpeg,png']);
        }
        return $rules;
    }
}
