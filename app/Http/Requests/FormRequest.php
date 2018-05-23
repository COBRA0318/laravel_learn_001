<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //trueに変更
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //バリデーションルールの設定
            'name' => 'required|max:10',
            'email' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'nameを入力してください。',
            'name.max' => 'nameは10字以内でお願いします。',
            'email.required' => 'emailを入力してください。',
            'password.required' => 'passwordを入力してください。',
            'password.min' => 'passwordは8字以上でお願いします。',
            'password.confirmed' => '確認passwordと一致しません。',
            'password_confirmation.required' => '確認用passwordを入力してください。',
            'password_confirmation.min' => '確認用passwordも8字以上でお願いします。',
        ];
    }
}
