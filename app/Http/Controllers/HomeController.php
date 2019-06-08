<?php

namespace App\Http\Controllers;

use App\AboutPage;
use App\Image;
use App\Ministry;
use App\Post;
use App\Imports\MembersImport;
use App\Exports\MembersExport;
use App\Video;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

	public function video($id)
	{
		$video = Video::findOrFail($id);
		$videos = Video::all();
		return view('video', compact('video', 'videos'));
	}
	
	public function import(Request $request)
	{
		Excel::import(new MembersImport, $request->file('file'));
		return redirect('/admin/members');
	}
	
	public function ex()
	{
		return Excel::download(new MembersExport, 'members.xlsx');
	}

	public function video_upload(Request $request)
	{
		$video = new Video();
		$video->name = $request->name;
		$video->description = $request->description;

		$thumbnail = $request->file('video_thumbnail');
		$video_file = $request->file('video');

		$video->video_thumbnail = $thumbnail->getClientOriginalName();
		$video->video_thumbnail = str_replace(' ','_',$video->video_thumbnail);
		$video->video = $video_file->getClientOriginalName();
		$video->video = str_replace(' ','_',$video->video);

		// move the file to correct location
		if (!file_exists('storage/video')) {
			mkdir('storage/video', 0777, true);
		}
		$video_file->move('storage/video', $video->video);

		if (!file_exists('storage/video/thumbnails')) {
			mkdir('storage/video/thumbnails', 0777, true);
		}
		$thumbnail->move('storage/video/thumbnails', $video->video_thumbnail);

		$video->save();

		return back();
	}
	
}
