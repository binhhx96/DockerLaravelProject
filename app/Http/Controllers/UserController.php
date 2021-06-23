<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use JWTAuth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

	public function index(Request $request)
	{
        $user = JWTAuth::toUser( $request->bearerToken());

		return response()->json($user, 200);
	}

	public function getAllUser() {
        $allUser = $this->userService->getAllUser();
        return response()->json($allUser, 200);
    }
}
