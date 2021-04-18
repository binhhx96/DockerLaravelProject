<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(Request $request)
	{
        $user = JWTAuth::toUser( $request->bearerToken());

		return response()->json($user, 200);
	}
}
