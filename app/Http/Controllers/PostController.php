<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostTranslate;
use Illuminate\View\View;

class PostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $lang = ['en' => '/', 'ru' => '/ru', 'az' => '/az'];
        return view('welcome', compact('lang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request) {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        //
    }

    public function post($slug): View {
        $post = PostTranslate::whereSlug($slug)->join('posts', 'posts.id', '=', 'post_translates.post_id')->first();
        $slugs = PostTranslate::wherePostId($post->post_id)->get();
        $lang = ['en' => '/post/' . $slugs->where('lang', 'en')->first()->slug, 'ru' => '/ru/skadka/' . $slugs->where('lang', 'ru')->first()->slug,
            'az' => '/az/meqale/' . $slugs->where('lang', 'az')->first()->slug];
        return view('post', compact('post', 'lang'));
    }
}
