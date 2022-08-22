<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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


        return redirect()->route('index.post')->with('msg', 'Post created successfuly');

    }


        public function destroy($id)
        {
            // Post::destroy($id);
            $post = Post::find($id);

            File::delete(public_path('uploads/'.$post->image));
            $post->delete();
            return redirect()->back();
        }


    public function edit($id)
{
    $post =Post::find($id);
    return view('posts2.edit', compact('post'));
}

public function update(Request $request , $id)
{
    $request->validate([
        'name' => 'required',
        // 'image' => 'required',
        //  لاني بعته
        'content' => 'required',
    ]);


        $post = Post::find($id);
        $img_name = $post->image;
    //
    if($request->hasFile('image')){
        $img_name = rand().time().$request->file('image')->getClientOriginalName();

        //  getClientOriginalName كيف يجيبلي اسم الصورة و انا اصلا م رفعتش
        $request->file('image')->move(public_path('uploads'), $img_name);
    }

    //

    $post->update([
        'title' => $request->title,
        'image' => $img_name,
        'content' => $request->content,
    ]);

    return redirect()->route('index.post')->with('msg', 'Post updated');


}

}




