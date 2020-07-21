<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;

class HomeController extends Controller
{
    public function index()
    {
        $workers = Worker::orderBy('created_at', 'desc')->paginate(10);

        return view('index', compact('workers'));
    }
}
