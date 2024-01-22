<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request, Member $member)
    {
        $searchTerm = $request->input('search_term');

        $members = Member::query()
            ->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('id', 'like', '%' . $searchTerm . '%')
            ->orWhere('department', 'like', '%' . $searchTerm . '%')
            ->orWhere('address', 'like', '%' . $searchTerm . '%')
            ->paginate(5);

        $master = Member::find(auth()->user()->id);

        if($master->role == 'Master Admin'){

            if ($request->ajax()) {
                return view('admin.master', ['members' => $members])->render();
            }

            return view('admin.master', compact('members'));
        }

        elseif ($master->role == 'Admin'){

            if ($request->ajax()) {
                return view('admin', ['members' => $members])->render();
            }

            return view('admin.admin', compact('members'));
        }

        else {

            if ($request->ajax()) {
                return view('welcome', ['members' => $members])->render();
            }

            return view('home', compact('members'));
        }
    }

    public function masterAdmin(Request $request, Member $member)
    {
        $master = Member::find(auth()->user()->id);

        if($master->role == 'Master Admin'){
            $searchTerm = $request->input('search_term');

            $members = Member::query()
                ->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('id', 'like', '%' . $searchTerm . '%')
                ->paginate(5);

            if ($request->ajax()) {
                return view('welcome', ['members' => $members])->render();
            }

            return view('admin.master', compact('members'));
        }

        else{
            return redirect('/');
        }
    }

    public function editRole(Request $request, Member $member){

        $master = Member::find(auth()->user()->id);

        if($master->role == 'Master Admin') {
            return view('admin.getid');
        }

        else{
            return redirect('/');
        }
    }


    public function edit(Request $request, Member $member)
    {
        $master = Member::find(auth()->user()->id);

        if($master->role == 'Master Admin') {
            $searchTerm = $request->input('id');

            $member = Member::find($searchTerm);

            if ($member) {
                return view('admin.edit', compact('member'));
            } else {
                Session::flash('error', 'No Member Found !!!');
                return redirect('admin/edit/member/role');
            }
        }

        else{
            return redirect('/');
        }
    }

    public function update(Request $request, Member $member)
    {
        $master = Member::find(auth()->user()->id);

        if($master->role == 'Master Admin') {

            $searchTerm = $request->input('id');

            $member = Member::find($searchTerm);

            try {
                $request->validate([
                    'id' => 'required',
                    'name' => 'required',
                    'role' => 'required'
                ]);

                $member->update($request->all());

                Session::flash('success', 'Member updated successfully !!!');
            } catch (Exception $e) {
                Session::flash('error', $e);
            }

            return redirect('admin/edit/member/role');
        }

        else{
            return redirect('/');
        }
    }

}
