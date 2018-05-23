<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//作成したリクエストをuse
use App\Http\Requests\FormRequest;

class FormController extends Controller
{
    //formResultメソッドを作成
    //※引数に注目※
    public function formResult(FormRequest $request)
    {
        //入力値を表示させるviewを返す
        return view('pages.formResult', $request->all());
    }
}
