<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->subtitle = $request->get('subtitle');
        $post->excerpt = $request->get('excerpt');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->user_id = $request->get('user_id');
        $post->published_at = $request->get('published_at');
        $post->save();

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');

            $dt = now();
            $extension = $image->extension();
            $filename = implode('.', [
                $dt->format('YmdHis'),
                $extension
            ]);

            Image::make($image)->resize(1200, 450);
            $imagePath = $image->storeAs('public/images', $filename);
            $post->fill(['image_path' => Storage::url($imagePath)])->save();
        }

        if(isset($request->tags)){
            $post->tags()->attach($request->get('tags'));
        }

        return redirect()->route('admin.posts.edit', $post)
            ->with('message', 'La publicación ha sido creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->subtitle = $request->get('subtitle');
        $post->excerpt = $request->get('excerpt');
        $post->content = $request->get('content');
        $post->category_id = $request->get('category_id');
        $post->user_id = $request->get('user_id');
        $post->published_at = $request->get('published_at');
        $post->save();

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');

            $dt = now();
            $extension = $image->extension();
            $filename = implode('.', [
                $dt->format('YmdHis'),
                $extension
            ]);

            $oldFilePath = str_replace('storage', 'public', $post->image_path);
            Storage::delete($oldFilePath);

            Image::make($image)->resize(1200, 450);
            $imagePath = $image->storeAs('public/images', $filename);
            $post->fill(['image_path' => Storage::url($imagePath)])->save();
        }

        if(isset($request->tags)){
            $post->tags()->sync($request->get('tags'));
        }

        return redirect()->route('admin.posts.edit', $post)
            ->with('message', 'La publicación ha sido actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->detach();

        $oldFilePath = str_replace('storage', 'public', $post->image_path);
        Storage::delete($oldFilePath);

        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'La publicación ha sido eliminada.');
    }
}
