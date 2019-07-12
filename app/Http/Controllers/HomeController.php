<?php

namespace App\Http\Controllers;

use App\AboutPage;
use App\Department;
use App\Image;
use App\ImageFolder;
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
use Illuminate\Http\Request;
use App\Page;
use Carbon\Carbon;
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
    	$services = Service::whereIn('recurrence', array('day', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'))->take(3)->get();
    	$now = Carbon::today();
    	$event = Service::whereIn('recurrence', array('once', 'month', 'year',))
			->where('event_date', '>=', $now)->orderBy('event_date')->first();
        return view('home',compact('posts', 'intros', 'services', 'event'));
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

	public function image_library()
	{
		$folders = ImageFolder::latest()->get();
		return view('image_folders', compact('folders'));
	}

	public function images($id)
    {
    	$folder = ImageFolder::findOrFail($id);
        $images = Image::latest()->where('parent_folder', $folder->folder_name)->get();
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
		$services = Service::whereIn('recurrence', array('day', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'))->get();
		return view('services', compact('services'));
	}

	public function press()
	{
		$press = Page::latest()->get();
		$press_items = $press->toArray();
		$resources = Resource::latest()->get();
		return view('press', compact('press_items' ,'resources'));
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
			\Mail::to('info@copc3assembly.org')->send(new Join_Department($data));
			return back()->withsuccess('Great! Mail successfully sent');
		}
		catch(\Exception $e){
			return back()->withErrors('There was a connection problem.Sorry! Please try again later');
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
			\Mail::to('info@copc3assembly.org')->send(new Join_Ministry($data));
			return back()->withsuccess('Great! Mail successfully sent');

		}
		catch(\Exception $e){
			return back()->withErrors('There was a connection problem.Sorry! Please try again later');
		}
	}
}
