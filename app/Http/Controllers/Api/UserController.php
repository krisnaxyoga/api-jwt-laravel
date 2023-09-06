<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\PostResource;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
         //get posts
         $posts = User::latest()->paginate(5);

         //return collection of posts as a resource
         return new PostResource(true, 'List Data User', $posts);
    }
}
