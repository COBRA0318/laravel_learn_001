<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * 認証関係の判定を行う場合はここに処理を記述する。
     * 特にない場合は常にtrueを返しておく。
     */
    public function authorize() {
        return true;
    }

    /**
     * バリデーションルールを記述
     */
    public function rules() {
        return [
            'username' => 'required|max:20',
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
