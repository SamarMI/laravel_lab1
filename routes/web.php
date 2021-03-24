<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\Authenticatable;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');

Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::post('/posts/{post}',[PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}', [PostController::class, 'destory'])->name('posts.destory')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
    echo "redirect";
});

Route::get('/auth/callback', function () {
    $user_git = Socialite::driver('github')->user();
   // dd($user_git);


 // $new_user=new User;

        $new_user = User::where('email', $user_git->email);
        //dd($new_user);
        if ( ! $new_user ) {    
            $new_user->name=$user_git->name;
            $new_user->password=$user_git->id;
            $new_user->email=$user_git->email;
            $new_user->save();
            Auth::login($new_user,$remember = false);
            return redirect()->route('posts.index');
        }
        else{
            Auth::login($new_user,$remember = false);
            return redirect()->route('posts.index');
            
            }  


});

Route::get('/auth/google/callback', function () {
            $user_google = Socialite::driver('google')->user();
            $new_user= new User;
        $new_user = User::where('email', $user1->email)->first();
        if ( ! $new_user ) {    
            $user->name=$user_google->name;
                $new_user->password=$user_google->id;
                $new_user->email=$user_google->email;
                $new_user->save();
                Auth::login($user);
                return redirect()->route('posts.index');
        }
       
        else{
        Auth::login($user);
        return redirect()->route('posts.index');

        }  
            

});