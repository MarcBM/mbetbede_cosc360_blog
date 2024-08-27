<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return response()->json([
            'data' => $users,
            'message' => 'Retrieved successfully',
        ], 200);
    }
}
