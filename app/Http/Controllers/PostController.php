<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;










class PostController extends Controller
{
    public function index()
    {$allPosts = Post::all(); //object of eloquent collection

        $Posts = Post ::paginate(4);
        return view('posts.index', [
            'posts' => $Posts,
        ]);
        /*
        return view('posts.index', [
            'posts' => $allPosts
        ]);*/
        
    }
    
    public function show($postId)
    {
        
        $post = Post::find($postId); //object of Post model

        // $anotherSyntax = Post::where('id', $postId)->first();
        //  $anotherSyntaxForSinglePost = Post::where('title', 'Laravel')->first(); //select * from posts where title = 'Laravel' limit 1;
        // $anotherSyntaxGetAllPostsWithTitle = Post::where('title', 'Laravel')->get(); //select * from posts where title = 'Laravel';

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all()
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // $requestData = request()->all();
        
        //another syntax
        // $title = request()->title;
        // $description = request()->description;
        //$validated = $request->validated();


        $requestData = $request->all();
        //dd($requestData);
        /* Post::create([
         'title' => $request->title,
          'description' => $request->description,
         ]);*/
        Post::create($requestData);

        //another syntax
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->save();

        return redirect()->route('posts.index');
    }
    public function edit($postId )
    {
        //echo "wlcome";
        $post = Post::find($postId); //object of Post model
        return view('posts.edit', [
            'post' => $post,
        ], [
            'users' => User::all()
        ]);

        
    }
    /*
    public function update($postId)
    {
        
        $post = Post::find($postId); //object of Post model

        // $anotherSyntax = Post::where('id', $postId)->first();
        //  $anotherSyntaxForSinglePost = Post::where('title', 'Laravel')->first(); //select * from posts where title = 'Laravel' limit 1;
        // $anotherSyntaxGetAllPostsWithTitle = Post::where('title', 'Laravel')->get(); //select * from posts where title = 'Laravel';

        $post = laravel::table('Post')
              ->where('id', 1)
              ->update(['votes' => 1]);

              
         //$requestData = $request->all();

         Post::update($requestData);

        return redirect()->route('posts.index');

    }*/

    public function update( UpdatePostRequests $request ,$postId ) 
    {
        
        $post = Post::find($postId); //object of Post model     
        $post->title = $request->title; 
         $post->description = $request->description;
         $post->user_id = $request->user_id;
        $post->save();
                return redirect()->route('posts.index');
      



    }
    public function destory($postId)
    {

        Post::find($postId)->delete();
        return redirect()->route('posts.index');

    }



}
