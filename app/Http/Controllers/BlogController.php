<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function home() {

        $posts = Post::published()->simplePaginate(4);
        return view('blog.home', compact('posts'));
    }

    public function about()
    {
        return view('blog.about');
    }

    public function getContact()
    {
        return view('blog.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'     =>  'required|email',
            'subject'   =>  'required',
            'body'      =>  'required'
        ]);

        $contact = [];

        $contact['email'] = $request->get('email');
        $contact['subject'] = $request->get('subject');
        $contact['body'] = $request->get('body');

        Mail::to(config('mail.from.address'))->send(new ContactForm($contact));

        return redirect()->back()->with('message', 'Enhorabuena, el correo se ha enviado al administrador');
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->pluck('id')->first();
        $posts =    Post::where('category_id', $category)
                    ->published()
                    ->simplePaginate(4);

        return view('blog.home', compact('posts'));
    }

    public function tag($slug)
    {
        $posts = Post::whereHas('tags', function($query) use ($slug){
                        $query->where('slug', $slug);
                  })->published()->simplePaginate(4);

        return view('blog.home', compact('posts'));
    }

    public function entry($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('blog.entry', compact('post'));
    }
}
