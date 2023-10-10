<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PostTranslation;
use App\Models\Blog\Post;

class postController extends Controller
{


    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());

        return redirect()->route('dashboard');
    }


    public function create()
    {
        return view('posts.create');
    }

    // public function store(Request $request) {
    //     $post_data = [
    //        'en' => [
    //            'title'       => $request->input('en_title'),
    //            'content'       => $request->input('en_content'),
            
    //        ],
    //        'es' => [
    //            'title'       => $request->input('es_title'),
    //            'content'       => $request->input('es_content'),
    //        ],
    //     ];
    
    //     // Now just pass this array to regular Eloquent function and Voila!    
    //     Post::create($post_data);
    
    //     // Redirect to the previous page successfully    
    //     return redirect()->route('dashboard');
    // }
}
