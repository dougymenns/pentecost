<?php

namespace App\Http\Controllers;

use App\Post;

class RestController extends Controller
{
	public function index()
	{
		$posts = Post::all();
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
}
