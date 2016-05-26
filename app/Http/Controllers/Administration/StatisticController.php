<?php

namespace App\Http\Controllers\Administration;

use Auth;
use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StatisticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view(Link $link)
    {
        $statistics = $link->statistics->map(function($value, $index) {
            return [
                'date'  => $value->created_at->format('F d, Y'),
                'visit' => 1,
            ];
        })
        ->groupBy('date')->map(function($value, $index) {
            return [
                'visits' => $value->count()
            ];
        });

        return view('administration.statistics.view', [
            'link' => $link,
            'statistics' => [
                'labels' => $statistics->keys(),
                'data' => $statistics->values()->flatten()
            ],
        ]);
    }

}