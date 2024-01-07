<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'employee_id' => $data['employee_id'],
            'pseudo' => $data['firstname'].' '.$data['lastname'].'-'.$data['employee_id'],
            'active' => true,
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'remember_token'=>Str::random(60),
        ]);
        return redirect()->action('UserController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $pswd = "";
        if ($data['password']) {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);
            $pswd = $data['password'];
        }
        $user = User::findOrFail($id);
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->role = $data['role'];
        $user->pseudo = $data['firstname'].' '.$data['lastname'].'-'.$user->employee_id;
        $user->save();
        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->action('UserController@index');
    }
}