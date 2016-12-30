<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Checkin;

class CheckinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data["latitude"] = $request->input("latitude");
        $data["longitude"] = $request->input("longitude");
        $data["tweet"] = $request->input("tweet");
        $data["user_id"] = Auth::user()->id;

        Checkin::create($data);
        return view('checkin',compact("data"));
    }
}
