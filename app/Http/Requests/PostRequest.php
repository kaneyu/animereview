<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'post.anime_name' => 'required|string|max:100',
            'animegenre' => 'required',
            'post.summary' =>'required|string',
        ];
    }
}
