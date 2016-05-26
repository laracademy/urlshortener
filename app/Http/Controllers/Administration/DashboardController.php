<?php

namespace App\Http\Controllers\Administration;

use Auth;
use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('administration.dashboard.index', [
            'links' => Link::with('statistics')->orderBy('created_at', 'desc')->get()
        ]);
    }

}