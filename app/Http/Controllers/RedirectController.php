<?php

namespace App\Http\Controllers;

use Auth;
use App\Link;
use App\Statistic;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RedirectController extends Controller
{
    public function __construct()
    {
        // any one can access this
    }

    public function index($slug)
    {
        $link = Link::loadBySlug($slug)->first();

        // validate the slug
        if($link)
        {
            // Add a visit
            $link->addVisit();
            return redirect()->away($link->url);
        }

        // we are down here because we didn't find the link
        return redirect()->away(env('DEFAULT_REDIRECT', 'https://laracademy.co'));
    }

}