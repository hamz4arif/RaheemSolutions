<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $models = User::all();


        return view('user.index', [
            'models' => $models,
        ]);
    }
}
