<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|max:100|min:2',
            'description' => 'max:255',
            'thumb' => 'max:255|min:0',
            'price' => 'required|max:6|min:1',
            'series' => 'max:255',
            'sale_date' => 'required|max:10|min:1',
            'type' => 'max:30|min:0',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.max' => 'Il titolo deve avere al massimo :max caratteri',
            'title.min' => 'Il titolo deve avere al minimo :min caratteri',
            'description.max' => 'Il titolo deve avere al massimo :max caratteri',
            'thumb.max' => 'La URL \'immagine  deve avere al massimo :max caratteri',
            'thumb.min' => 'La URL \'immagine deve avere al minimo :min caratteri',
            'price.required' => 'Il prezzo è un campo obbligatorio',
            'price.max' => 'Il prezzo deve avere al massimo :max caratteri',
            'price.min' => 'Il prezzo deve avere al minimo :min caratteri',
            'series.max' => 'Series deve avere al massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è un campo obbligatorio',
            'sale_date.max' => 'La data di vendita deve avere al massimo :max caratteri',
            'sale_date.min' => 'La data di vendita deve avere al minimo :min caratteri',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.max' => 'Il tipo deve avere al massimo :max caratteri',
            'type.min' => 'Il titolo deve avere al minimo :min caratteri',
        ];
    }
}
