<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class IndexController extends Controller
{
    public function index(){
        $posts=Post::orderBy("created_at","DESC")->limit(3)->get();
        // dd($posts);
        return view('welcome' ,[ "posts"=>$posts,
    ]);
    }
    public function showContactForm(){
        return view("contact_form");
    }
    public function contactForm(ContactFormRequest $request){
        Mail::to($request->email)->send(new ContactForm($request->validated()));
        return redirect(route("contacts"));
    }
}
