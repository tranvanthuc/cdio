<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
            'title' => 'required',
            'sltMajors' => 'required',
            'subject' => 'required',
            'desc' => 'required',
            'price' => 'required|numeric',
            'fImage' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter title news !',
            'sltMajors.required' => 'Please choose major !',
            'subject.required' => 'Please enter subject !',
            'desc.required' => 'Please enter description !',
            'price.required' => 'Please enter price',
            'price.numeric' => 'Please enter price is numeric !',
            'fImage.required' => 'Please choose image display news !',
            'fImage.image' => 'Please choose type of image are jpg, jpeg, png'
        ];
    }
}