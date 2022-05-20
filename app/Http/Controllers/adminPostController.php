<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use function Symfony\Component\String\b;

class adminPostController extends Controller
{
    protected function validatePost(Post $post=null){
        $post ??=new Post();
        return request()->validate([
            'title'=>['required','min:7','max:255',Rule::unique('posts','title')->ignore($post)],
            'excerpt'=>'required|min:7|max:255',
            'thumbnail'=>$post->exists ? 'image' : ['image','required'],
            'category_id'=>'required|numeric|exists:categories,id',
            'id'=>'exist:posts,id',
            'body'=>'required|min:7|max:255'
        ]);
    }

    public function postTable(){
        $posts = Post::all();
        return Datatables::of($posts)->addColumn('action', function ($post) {
            return '<a href="/admin/posts/'.$post->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="/admin/posts/'.$post->id.'/change" class="btn btn-xs btn-info " style="margin-left: 1px"><i class="glyphicon glyphicon-edit"></i> change</a>
                    <a href="/admin/posts/'.$post->id.'/delete" class="btn btn-xs btn-danger " style="margin-left: 1px"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
        })->make(true);
    }

    public function allPosts(){
        return view('admin.posts.all');
    }

    public function createPost(){
        return view('admin.posts.create',['categories'=>Category::all()]);
    }

    public function storePost(){
        Post::create(array_merge($this->validatePost(),[
            'thumbnail' => request()->file('thumbnail')->store('admin/postThumbnails'),
            'user_id' => auth()->user()->id,
            'status'=>'published']));
        return redirect('admin/posts/all');
    }

    public function editPost(Post $post){
        return view('admin.posts.edit',['post'=>$post,'categories'=>Category::all()]);
    }

    public function updatePost(Post $post){
        $attr=$this->validatePost($post);
        if(request()->file('thumbnail')){
            $attr['thumbnail']=request()->file('thumbnail')->store('admin/postThumbnails');
        }
        $post->update($attr);
        return redirect('admin/posts/all');
    }

    public function deletePost(Post $post){
        $post->forceDelete();
        return back();
    }

    public function changeStatus(Post $post){
        ($post->status === 'waiting')?$post->update(['status'=>'published']):$post->update(['status'=>'waiting']);
        return back();
    }


}
