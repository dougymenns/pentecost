<?php

namespace App\Http\Controllers;

use App\Image;
use App\Livestream;
use App\Ministry;
use App\Post;
use App\Imports\MembersImport;
use App\Exports\MembersExport;
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
    	$stream = Livestream::all();
        return view('home',compact('posts','stream'));
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
	
	public function import(Request $request)
	{
		Excel::import(new MembersImport, $request->file('file'));
		return redirect('/admin/members');
	}
	
	public function ex()
	{
		return Excel::download(new MembersExport, 'members.xlsx');
	}
	
}
