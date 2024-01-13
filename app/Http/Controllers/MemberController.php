<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('search_term');

        $members = Member::query()
            ->where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('id', 'like', '%' . $searchTerm . '%')
            ->paginate(5);

        if ($request->ajax()) {
            return view('welcome', ['members' => $members])->render();
        }

        return view('welcome', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => 'required',
            'department' => 'required',
            'session' => 'required',
            'joining_date' => 'required|date',
            'mobile_no' => 'required|numeric',
            'email' => 'email|required',
            'address' => 'required',
            'blood_group' => 'required'
        ]);

        try{

            Member::create([
                'id' => $request['id'],
                'name' => $request['name'],
                'department' => $request['department'],
                'session' => $request['session'],
                'joining_date' => $request['joining_date'],
                'mobile_no' => $request['mobile_no'],
                'email' => $request['email'],
                'address' => $request['address'],
                'blood_group' => $request['blood_group'],
            ]);

            User::create([
                'id' => $request['id'],
                'password' => Hash::make($request['password']),
            ]);

        }catch (Exception $e){
            return redirect()->back()->withInput($request->only('id'))->withErrors([
                'id' => 'Member Already Exists !!!',
            ]);
        }

        Session::flash('success', 'Member registered successfully !!!');

        return redirect('/register');
    }

    public function edit(Request $request, Member $member)
    {
        $searchTerm = $request->input('id');

        $member = Member::find($searchTerm);

        if($member){
            return view('members.edit', compact('member'));
        }
        else{
            Session::flash('error', 'No Member Found !!!');
            return redirect('/edit');
        }
    }

    public function getidforedit()
    {
        return view('members.getid');
    }

    public function update(Request $request, Member $member)
    {

        $searchTerm = $request->input('id');

        $member = Member::find($searchTerm);

        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'department' => 'required',
            'session' => 'required',
            'joining_date' => 'required|date',
            'mobile_no' => 'required|numeric',
            'email' => 'email',
            'address' => 'required',
            'blood_group' => 'required'
        ]);

        $member->update($request->all());

        Session::flash('success', 'Member updated successfully !!!');

        return redirect('/edit');
    }

    public function getidfordelete()
    {
        return view('members.getidfordelete');
    }

    public function viewtodelete(Request $request, Member $member)
    {
        $searchTerm = $request->input('id');

        $member = Member::find($searchTerm);

        if($member){
            return view('members.delete', compact('member'));
        }
        else{
            Session::flash('error', 'No Member Found !!!');
            return redirect('/delete');
        }
    }

    public function delete(Request $request, Member $member)
    {

        $searchTerm = $request->input('id');

        $member = Member::find($searchTerm);

        $member->delete();

        Session::flash('success', 'Member deleted successfully !!!');

        return redirect('/delete');
    }

}
