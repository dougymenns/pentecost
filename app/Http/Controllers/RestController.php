<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;

class RestController extends Controller
{
	public function index()
	{
		$posts = Post::latest()->paginate(2);
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
}
