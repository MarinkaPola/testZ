<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BirdRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [];
        if ($this->isMethod('post')) {
            $rules = [
                'title' => 'required|string|min:2|max:60',
                'text' => 'required|string|min:60|max:250',
                'image' => 'required|string|min:15|max:60',
                'url' => 'required|string|min:15|max:60',
                'active' => 'required|integer|min:0|max:1',
                'sort_order' => 'required|integer|min:1|max:10',
              //  'user_id' => 'required|integer|exists:categories,id',
            ];
        }
        elseif ($this->isMethod('put')) {
            $rules = [
                'title' => 'required|string|min:2|max:60',
                'text' => 'required|string|min:60|max:250',
                'image' => 'required|string|min:15|max:60',
            ];
        }
        return $rules;

    }

}
