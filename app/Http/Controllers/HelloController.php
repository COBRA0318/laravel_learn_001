<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

use App\Http\Requests\HelloRequest;

use Illuminate\Support\Facades\DB;

use Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Person;

class HelloController extends Controller
{
	
    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい。'];
        return view('hello.auth', $param);

    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 
                'password' => $password])) {
            $msg = 'ログインしました。（' . Auth::user()->name . '）';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
    }

    public function index(Request $request)
    {
//        // $user = Auth::user();
//        $sort = $request->sort;
//        $items = Person::orderBy($sort, 'asc')
//            ->simplePaginate(10);
//        $param = ['items' => $items, 'sort' => $sort]; // , 'user' => $user];
//    //        return view('hello.index', $param);
//        //一覧表示用
//    //    return view('hello.index', ['data' => $request->data]);
//
////        return view('hello.index', ['msg'=>'フォームを入力']);
//        return view('hello.index', ['message'=>'Hello!']);
        $validator = Validator::make($request->query(),[
            'id' => 'required',
            'pass' => 'required'
        ]);
        if($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        }else{
            $msg = 'ID/PASSを受け付けました。フォームを入力下さい。';
        }
        return view('hello.index', ['message'=>$msg,]);
    }

//バリデータHelloRequest作成のため、修正
//    public function post(Request $request)
//    public function post(HelloRequest $request)
    public function post(Request $request)
    {
  //      $items = DB::select('select * from people');
  // return view('hello.index', ['items' => $items]);

//バリデータHelloRequest作成のため、コメントアウト
//        $validate_rules = [
//            'name' => 'required',
//            'mail' => 'email',
//            'age' => 'numeric|between:0,150',
//        ];
        $validator = Validator::make($request->all(),[
             'name' => 'required',
             'mail' => 'email',
             'age'  => 'numeric|between:0,150'
         ]);

        if($validator->fails()){
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
//
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }

	public function add(Request $request)
	{
		return view('hello.add');
	}

	public function create(Request $request)
	{
		$param = [
			'name' => $request->name,
			'mail' => $request->mail,
			'age' => $request->age,
		];
		DB::table('people')->insert($param);
		//DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
		return redirect('/hello');
	}

    public function edit(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        //DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {
        DB::table('people')
            ->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    // session.

    public function ses_get(Request $request)
    {
        $sesdata = Session::get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
   }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        Session::put('msg', $msg);
        return redirect('hello/session');
    }

}

