<?php

namespace App\Http\Controllers;
use DB;
use App\Discussion;
use App\Markdown\Markdown;
use Illuminate\Http\Request;

use App\Http\Requests;
use EndaEditor;

class PostsController extends Controller
{
    protected $markdown;
    public function __construct(Markdown $markdown)
    {
        $this->middleware('auth',['only'=>['create','store','edit','update']]);
        $this->markdown=$markdown;
    }

    public function index(){
        $discussions=Discussion::latest()->paginate(10);
        return view('forum.index',compact('discussions'));
    }



    public function show($id){
        $discussion=Discussion::findOrFail($id);

        //  $html=$this->markdown->markdown($discussion->body);
      $html=$discussion->body;
        return view('forum.show',compact('discussion','html'));
    }

    public function create(){
        return view('forum.create');

    }

    public function store(Requests\StoreBlogPostRequest $request){
             $data=[
                 'user_id'=>\Auth::user()->id,
                 'last_user_id'=>\Auth::user()->id,

             ];
        $discussion=Discussion::create(array_merge($request->all(),$data));
        return redirect()->action('PostsController@show',['id'=>$discussion->id]);
    }

    public function edit($id){
        $discussion=Discussion::findOrFail($id);
        if(\Auth::user()->id !== $discussion->user_id){
            return redirect('/');
        }

        return view('forum.edit',compact('discussion'));
    }

    public function update(Requests\StoreBlogPostRequest $request,$id){
        $discussion=Discussion::findOrFail($id);
        $discussion->update($request->all());
        return redirect()->action('PostsController@show',['id'=>$discussion->id]);

    }

    public function upload(){
        $data = EndaEditor::uploadImgFile('uploads');

        return json_encode($data);
    }
}
