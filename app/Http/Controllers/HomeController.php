<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //dd(auth()->check());
        //dd(Auth::user());
        //dd(auth()->user());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');

        $members = Member::query()
            ->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('id', 'like', '%' . $searchTerm . '%')
            ->orWhere('department', 'like', '%' . $searchTerm . '%')
            ->orWhere('address', 'like', '%' . $searchTerm . '%')
            ->paginate(5);

        if ($request->ajax()) {
            return view('welcome', ['members' => $members])->render();
        }

        return view('home', compact('members'));
    }
}
