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
}
