<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Service;

class RestController extends Controller
{
	public function index()
	{
		$posts = Post::latest()->get();
		return response()->json([
			"posts" => $posts
		], 200);
	}

	public function post($id)
	{
		$post = Post::findOrFail($id);
		return response()->json([
			"post" => $post
		], 200);
	}

	public function press()
	{
		$press = Page::latest()->get();
		return response()->json([
			"press" => $press
		], 200);
	}

	public function single_press($id)
	{
		$press = Page::findOrFail($id);
		return response()->json([
			"press" => $press
		], 200);
	}

	public function services()
	{
		$services = Service::whereIn('recurrence', array('day', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'))->get();
		return response()->json([
			"services" => $services
		], 200);
	}

	public function service($id)
	{
		$service = Service::findOrFail($id);
		return response()->json([
			"service" => $service
		], 200);
	}

	public function search_post($search_term)
	{
		$results = Post:: where('title', 'like', "%$search_term%")
		->orWhere('excerpt', 'like', "%$search_term%")
		->orWhere('body', 'like', "%$search_term%")
		->get();
		return response()->json([
			"results" => $results
		], 200);
	}

	public function search_press($search_term)
	{
		$results = Page:: where('title', 'like', "%$search_term%")
			->orWhere('excerpt', 'like', "%$search_term%")
			->orWhere('body', 'like', "%$search_term%")
			->get();
		return response()->json([
			"results" => $results
		], 200);
	}

	public function search_service($search_term)
	{
		$results = Service:: where('name', 'like', "%$search_term%")
			->orWhere('description', 'like', "%$search_term%")
			->orWhere('sessions', 'like', "%$search_term%")
			->orWhere('event_date', 'like', "%$search_term%")
			->orWhere('location', 'like', "%$search_term%")
			->get();
		return response()->json([
			"results" => $results
		], 200);
	}
}
