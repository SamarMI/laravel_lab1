<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;




class PostController extends Controller
{
    public function index()
    {$allPosts = Post::all(); //object of eloquent collection

        return view('posts.index', [
            'posts' => $allPosts
        ]);
        return view('posts.index', [
            'posts' => $allPosts
        ]);
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

    public function store(Request $request)
    {
        // $requestData = request()->all();
        
        //another syntax
        // $title = request()->title;
        // $description = request()->description;

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
    public function edit($postId)
    {
        //echo "wlcome";
        $allPosts =[ ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmai.com']
        , ['id' => 2, 'title' => 'PHP', 'description' => 'php is native language ', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15','email'=>'Mohamed@gmai.com']
        , ['id' => 3, 'title' => 'Javascript', 'description' => 'Javascript is native language ', 'posted_by' => 'Mohamed', 'created_at' => '2021-06-01','email'=>'Ali@gmai.com'],
     ];
   //  $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];
   
        return view('posts.edit', [
            'post' => $allPosts[$postId -1],
        ]);
    }
}
