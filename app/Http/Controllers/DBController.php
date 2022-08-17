<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DBController extends Controller
{
    public function index()
    {
        // $posts= Post::all() ;
        // $posts = Post::find(20);
        // $posts =Post::select('name', 'content')->get();
        // $posts =Post::where('name', '=','quae voluptas');
        // $posts =Post::where('id', 5)->first();
        // $posts=Post::orderByDesc('id')->get();

        // dd($posts);

        // $posts= Post::all() ;

        // $posts=Post::orderByDesc('id')->simplePaginate(20);

// كم عنصر يعرضلي ف الصفحة
        $count = 20;
        if(request()->has('count')) {
            $count = request()->count;
        }

//search +pagenation
        if(request()->search){
            $posts=Post::where('name','like','%'.request()->search.'%')->orderByDesc('id')->paginate(20);

        }else{
            $posts=Post::orderByDesc('id')->paginate($count);

        };

        return view('posts2.index', compact('posts'));
    }


    public function create()
    {
        return view('posts2.create');
    }



    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'content' => 'required',
        ]);

        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads'), $img_name);

        Post::create([
            'name' => $request->name,
            'image' => $img_name,
            'content' => $request->content,
        ]);


        return redirect()->route('index.post');




}}


