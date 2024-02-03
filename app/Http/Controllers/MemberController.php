<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Mail\RegistrationDone;
use App\Models\Member;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        if (Auth::check()){
            $member = Member::find(auth()->user()->id);

            if($member->role == 'General Member'){
                return redirect('/');
            }
        }


        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|size:10',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => 'required',
            'department' => 'required',
            'session' => 'required',
            'mobile_no' => 'required|numeric|digits:11',
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
                'mobile_no' => $request['mobile_no'],
                'email' => $request['email'],
                'address' => $request['address'],
                'blood_group' => $request['blood_group'],
                'role' => 'General Member',
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

        Mail::to($request['email'])->send(new RegistrationDone($request['name']));

        if (!Auth::check()){
            Session::flash('success', 'Member registered successfully !!! Login Now');

            return redirect('/login');
        }

        else{
            Session::flash('success', 'Member registered successfully !!!');

            return redirect('/register');
        }


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

        if (Auth::check()){
            $member = Member::find(auth()->user()->id);

            if($member->role == 'Admin' || $member->role == 'Master Admin'){
                return view('members.getid');
            }
        }

        return redirect('/');
    }

    public function update(Request $request, Member $member)
    {

        $searchTerm = $request->input('id');

        $member = Member::find($searchTerm);

        $request->validate([
            'id' => 'required|size:10',
            'name' => 'required',
            'department' => 'required',
            'session' => 'required',
            'joining_date' => 'required|date',
            'mobile_no' => 'required|numeric|digits:11',
            'email' => 'email',
            'address' => 'required',
            'blood_group' => 'required',
            'role' => 'General Member'
        ]);

        $member->update($request->all());

        Session::flash('success', 'Member updated successfully !!!');

        return redirect('/edit');
    }

    public function getidfordelete()
    {
        if (Auth::check()){
            $member = Member::find(auth()->user()->id);

            if($member->role == 'Admin' || $member->role == 'Master Admin'){
                return view('members.getidfordelete');
            }
        }

        return redirect('/');
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
