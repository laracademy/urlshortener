<?php

namespace App\Http\Controllers\Administration;

use Auth;
use Config;
use App\Link;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('administration.link.create');
    }

    public function insert(Request $request)
    {
        $rules = [
            'name' => 'required',
            'url'  => 'required',
        ];

        // validate request
        $this->validate($request, $rules);

        // if validation is good
        $preSlug = ($request->has('slug')) ? $request->input('slug') : '';
        try {
            $slug = Link::makeSlug(Config::get('slug.maximum_tries'), $preSlug);

            // create link
            Link::create([
                'name' => $request->input('name'),
                'url'  => $request->input('url'),
                'slug' => $slug,
            ]);

            return redirect()->route('administration.dashboard')->with('success', ['Link successfully added']);
        } catch (\Exception $e) {
            return redirect()->route('administration.dashboard')->withErrors($e->getMessage());
        }
    }

    public function edit($link_id)
    {
        $link = Link::loadById($link_id)->first();

        // validation
        if(! $link)
        {
            return redirect()->route('administration.dashboard')->withErrors(['Invalid Link']);
        }

        return view('administration.link.edit', [
            'link' => $link
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'url'  => 'required',
        ];

        // validate request
        $this->validate($request, $rules);

        // validate link
        $link = Link::loadById($request->input('id'))->first();
        if(! $link)
        {
            return redirect()->route('administration.dashboard')->withErrors(['Invalid Link']);
        }

        // update link
        $link->name = $request->input('name');
        $link->url = $request->input('url');
        if($request->input('slug') != $link->slug)
        {

            $preSlug = ($request->has('slug')) ? $request->input('slug') : '';
            try {
                $link->slug = Link::makeSlug(Config::get('slug.maximum_tries'), $preSlug);
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }

        }

        $link->save();

        return redirect()->route('administration.dashboard')->with('success', ['This url for '. $link->name .' was updated']);
    }

    public function destroy($link_id)
    {
        $link = Link::loadById($link_id)->first();

        if($link) {
            $link->delete();

            return redirect()->route('administration.dashboard')->with('success', ['The link has been successfully delete']);
        }

        return redirect()->route('administration.dashboard');
    }

}