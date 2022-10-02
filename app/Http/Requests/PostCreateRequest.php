<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title'      => 'required',
            'description'   => 'required',
            'image'      => '',
            'status'     => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title'      => 'タイトル',
            'description'   => '内容',
            'image'      => '画像',
            'status'     => '公開状態',
        ];
    }

    /**
    * 独自バリデーション処理
    * @param $validator
    */
    public function withValidator($validator)
    {
    }
}
