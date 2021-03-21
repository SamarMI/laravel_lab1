<?php

namespace App\Http\Controllers;
use App\Models\Post;

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
        
        $allPosts =[ ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20','email'=>'Ahmed@gmai.com']
                , ['id' => 2, 'title' => 'PHP', 'description' => 'php is native language ', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15','email'=>'Mohamed@gmai.com']
                , ['id' => 3, 'title' => 'Javascript', 'description' => 'Javascript is native language ', 'posted_by' => 'Mohamed', 'created_at' => '2021-06-01','email'=>'Ali@gmai.com'],
             ];
           //  $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];
        return view('posts.show', [
            'post' => $allPosts[$postId -1],
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //logic to insert request data into db

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
