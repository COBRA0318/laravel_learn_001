<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postCreate(CreateUserRequest $req) {
        /**
         * 拡張クラスに書いたルールでリクエストが自動的に検証される
               * バリデーションをパスするとこの後の処理が実行される
              */
        $this->userService->createUser($req->all());
        return view('...');
    }
}
