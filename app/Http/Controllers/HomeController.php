<?php

namespace App\Http\Controllers;

use App\AboutPage;
use App\Image;
use App\Ministry;
use App\Post;
use App\Video;
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

    public function about($id)
	{
		$about_page = AboutPage::findOrFail($id);
		return view('about', compact('about_page'));
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
		$videos = Video::all();
		return view('videos', compact('videos'));
	}
}
