<?php

namespace App\Http\Controllers;

use App\AboutPage;
use App\Department;
use App\Image;
use App\Intro;
use App\Mail\Join_Department;
use App\Mail\Join_Ministry;
use App\Ministry;
use App\Post;
use App\Imports\MembersImport;
use App\Exports\MembersExport;
use App\Video;
use App\livestream;
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
    	$posts = Post::latest()->take(3)->get();
    	$intros = Intro::all();
    	$links = livestream::all();
        return view('home',compact('posts', 'intros', 'links'));
    }

    public function posts()
	{
        $posts = Post::all();
        $links = livestream::all();
		return view('posts', compact('posts','links'));
	}

    public function about($id)
	{
        $about_page = AboutPage::findOrFail($id);
        $links = livestream::all();
		return view('about', compact('about_page','links'));
	}

    public function post($id)
	{
		$posts = Post::all();
        $post = Post::findOrfail($id);
        $links = livestream::all();
		return view('post',compact('posts','post','links'));
	}

    public function ministries()
	{
        $ministries = Ministry::all();
        $links = livestream::all();
		return view('ministries', compact('ministries','links'));
	}

	public function departments()
	{
        $departments = Department::all();
        $links = livestream::all();
		return view('departments', compact('departments','links'));
	}

	public function images()
    {
        $images = Image::all();
        $links = livestream::all();
    	return view('images', compact('images','links'));
    }

	public function videos()
	{
        $videos = Video::all();
        $links = livestream::all();
		return view('videos', compact('videos','links'));
	}

	public function video($id)
	{
		$video = Video::findOrFail($id);
        $videos = Video::all();
        $links = livestream::all();
		return view('video', compact('video', 'videos','links'));
	}

	public function Podcast()
	{
        $links = livestream::all();
		return view('podcast',compact('links'));
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

	public function join_department(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$phone = $request->phone;
		$interest = $request->interest;
		$department = $request->department;

		$data = [
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'interest' => $interest,
			'department' => $department,
		];

		  try{
			\Mail::to('ahenkoraakuamoah@gmail.com')->send(new Join_Department($data));
			return back()->withsuccess('Great! Mail successfully sent');
		}
		catch(\Exception $e){
			return back()->withErrors('There was a connection problem.Sorry! Please try again latter');
		}
	}

	public function join_ministry(Request $request)
	{
		$name = $request->name;
		$email = $request->email;
		$phone = $request->phone;
		$interest = $request->interest;
		$department = $request->department;

		$data = [
			'name' => $name,
			'email' => $email,
			'phone' => $phone,
			'interest' => $interest,
			'department' => $department,
		];

		try{
			\Mail::to('ahenkoraakuamoah@gmail.com')->send(new Join_Ministry($data));
			return back()->withsuccess('Great! Mail successfully sent');

		}
		catch(\Exception $e){
			return back()->withErrors('There was a connection problem.Sorry! Please try again latter');
		}
	}
}
