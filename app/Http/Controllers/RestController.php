<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;

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
}
