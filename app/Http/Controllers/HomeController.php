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
use App\Resource;
use App\Service;
use App\Video;
use App\Livestream;
use Illuminate\Http\Request;
use App\Page;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$posts = Post::latest()->take(3)->get();
    	$intros = Intro::all();
    	$services = Service::take(3)->get();
        return view('home',compact('posts', 'intros', 'services'));
    }

    public function posts()
	{
        $posts = Post::latest()->get();
		return view('posts', compact('posts'));
	}

    public function about($id)
	{
        $about_page = AboutPage::findOrFail($id);
		return view('about', compact('about_page'));
	}

    public function post($id)
	{
		$posts = Post::latest()->get();
        $post = Post::findOrfail($id);
		return view('post',compact('posts','post'));
	}

    public function ministries()
	{
        $ministries = Ministry::all();
		return view('ministries', compact('ministries'));
	}

	public function departments()
	{
        $departments = Department::latest()->get();
		return view('departments', compact('departments'));
	}

	public function images()
    {
        $images = Image::latest()->get();
    	return view('images', compact('images'));
    }

	public function videos()
	{
        $videos = Video::latest()->get();
		return view('videos', compact('videos'));
	}

	public function video($id)
	{
		$video = Video::findOrFail($id);
		$videos = Video::latest()->get();
		return view('video', compact('video', 'videos'));
	}

	public function services()
	{
		$services = Service::all();
		$services_count = count($services);
		if($services_count % 3 == 0) {
			$page_count = $services_count/3;
			$paginate_2 = $page_count;
			$paginate_3 = $page_count;
		} elseif (($services_count-1) % 3 == 0) {
			$page_count = ($services_count+2)/3;
			$paginate_2 = $page_count-1;
			$paginate_3 = $page_count-1;
			$page_3 = Service::latest()->take($services_count-1)->paginate($page_count-1, ['*'], 'page', 3);
		} else {
			$page_count = ($services_count+1)/3;
			$paginate_2 = $page_count;
			$paginate_3 = $page_count-1;
		}
		$page_1 = Service::latest()->paginate($page_count);
		$page_2 = Service::latest()->paginate($page_count, ['*'], 'page', 2)->take($paginate_2);
//		$page_3 = Service::latest()->paginate($page_count, ['*'], 'page', 3)->take($paginate_3);
		return view('services', compact('page_1', 'page_2', 'page_3'));
	}

	public function press()
	{
		$press_items = Page::all();
		$press_count = count($press_items);
		if($press_count % 3 == 0) {
			$page_count = $press_count/3;
		} elseif (($press_count-1) % 3 == 0) {
			$page_count = ($press_count+2)/3;
		} else {
			$page_count = ($press_count+1)/3;
		}
		$page_1 = Page::latest()->paginate($page_count);
		$page_2 = Page::latest()->paginate($page_count, ['*'], 'page', 2);
		$page_3 = Page::latest()->paginate($page_count, ['*'], 'page', 3);
		$resources = Resource::latest()->get();
		return view('press', compact('page_1', 'page_2', 'page_3' ,'resources'));
	}

	public function Podcast()
	{
		return view('podcast');
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
