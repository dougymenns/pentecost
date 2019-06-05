<?php

namespace App\Http\Controllers;

use App\Image;
use App\Ministry;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$posts = Post::all();
        return view('home',compact('posts'));
    }

    public function post($id)
	{
		$posts = Post::all();
		$post = Post::findOrfail($id);
		return view('post',compact('posts','post'));
	}

    public function departments()
	{
		$departments = Ministry::all();
		return view('departments', compact('departments'));
	}

	public function images()
    {
    	$images = Image::all();
    	return view('images', compact('images'));
    }

	public function videos()
	{
		$images = Image::all();
		return view('images', compact('images'));
	}
}
