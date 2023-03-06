<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
//追記
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index()
    {
        $todos = todo::all();
        $tags = tag::all();
        $user = Auth::user();
        $param = ['todos' => $todos, 'user' => $user, 'tags' => $tags];
        return view('index', $param);
    }
    
    public function store(TodoRequest $request)
    {
        $form = new todo();
        //$form = $request->all();
        $form = $request->all();
        unset($form['_token']);
        Todo::create($form);
        return redirect('/');
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        //Todo::where('id', $request->id)->update($form);
        Todo::find($request->id)->update($form);
        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $form = Todo::find($request->id);
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    

    public function find()
    {
        $user = Auth::user();
        $tags = tag::all();
        $param = ['tags' => $tags, 'user' => $user];
        return view('find', $param);
    }

    //search action色々試し中
    public function search(Request $request)
    {
        $user = Auth::user();
        //$tags = Tag::find($request->id);
        $tags = Tag::all();
        $todos = Todo::all();
        if(isset($request->content))
        {
            $todos->where('content', 'LIKE BINARY',"%{$request->content}%");
        }
        if(isset($request->tag_id))
        {
            $todos->where('tag_id', '=',"{$request->tag_id}");
        }
        //$todos = Todo::where('content', 'LIKE BINARY',"%{$request->content}%")->Where('tag_id', '=',"{$request->tag_id}")->get();
        $param = [
            //'input' => $request->input,
            'todos' => $todos,
            'user' => $user,
            'tags' => $tags
        ];
        return view('find', $param);
    }

    public function search2(Request $request)
    {
        $tags = Tag::all();
        $user = Auth::user();
        $todos = Todo::where('content', 'LIKE BINARY',"%{$request->content}%")->get();
        $tags = Tag::orWhere('id', '=',"{$request->tag_id}")->get();
        $param = [
            //'input' => $request->input,
            'todos' => $todos,
            'user' => $user,
            'tags' => $tags
        ];
        return view('find', $param);
    }
    //

    


    

}