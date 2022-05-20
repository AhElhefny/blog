<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Expression;
use Symfony\Component\HttpFoundation\Response ;

class postController extends Controller
{
    public function index()
    {
        $post =Post::latest()->filter(request(['search','category','user']))->where('status','=','published')->simplePaginate(6)->withQueryString();
        return view('post.welcome',['posts' =>$post]);
    }

    public function show(Post $post){
        return view('post.post',['post'=>$post]);
    }

    public function store(PostRequest $request){
        $data=array_merge($request->except('_token'),[
            'user_id'=>auth()->user()->id,
            'thumbnail'=>request()->file('thumbnail')->store('postThumbnails'),
            'status'=> (auth()->user()->role=='admin')?'published':'waiting'
        ]);
        Post::create($data);

        return \response()->json($data);
    }

    public function edit(Post $post){
        return view('post.edit',['post'=>$post,'categories'=>Category::all()]);
    }

    public function update(Post $post,PostRequest $request){
        $data=$request->all();
        if(request()->file('thumbnail')){
            $data['thumbnail']=\request()->file('thumbnail')->store('postThumbnails');
        }
        $post->update($data);
        return back();
    }

    public function destroy(Post $post){
        $post->delete();
        return back();
    }

//    protected function validatePost(Post $post=null){
//        $post??=new Post();
//        return request()->validate([
//            'title' => ['required','min:7','max:255',Rule::unique('posts','title')->ignore($post)],
//            'body' => 'required|min:7|max:255',
//            'excerpt' => 'required|min:7|max:255',
//            'category_id' => ['required',Rule::exists('categories','id')],
//            'thumbnail' => $post->exists ? ['image']:['image','required']
//
//        ]);
//    }
}
