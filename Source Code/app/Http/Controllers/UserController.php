<?php

namespace App\Http\Controllers;

use App\Major;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $majors = Major::all();

        return view('admin.add.users', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        request()->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);


        if (!empty($request->cv)) {
            $cvName = time() . $request->cv->getClientOriginalName();
            $request->cv->move(public_path('attachments'), $cvName);
        } else {
            $cvName = null;
        }
        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } elseif ($request->input('type') == 'company' || $request->input('type') == 'RequestCompany') {
            $image = 'defaultCompany.png';
        } else {
            $image = null;
        }
        if (!empty($request->cover)) {
            $coverImage = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $coverImage);
        } else {
            $coverImage = null;
        }


        $user = new User();
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->phone = $request->input('phone');
        $user->name = $request->input('name');
        $user->uni = $request->input('uni');
        $user->lname = $request->input('lname');
        $user->title = $request->input('title');
        $user->skills = $request->input('skills');
        $user->nationality = $request->input('nationality');
        $user->linkedin = $request->input('linkedin');
        $user->github = $request->input('github');
        $user->twitter = $request->input('twitter');
        $user->behance = $request->input('behance');
        $user->portfolio = $request->input('portfolio');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->about = $request->input('about');
        $user->type = $request->input('type');
        $user->major_id = $request->major_id;
        $user->cv = $cvName;
        $user->coverImage = $coverImage;
        $user->image = $image;
        $user->save();

        return redirect('/admin/user')->with('success', 'User created successfully.');
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

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin' && Auth::id() != $id) {
            return view('public.403');
        }

        $user = User::find($id);
        $majors = Major::all();
        $userSkills = explode(',', $user['skills']);
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $userTypes = ['user', 'admin', 'company', 'RequestCompany'];
        return view('admin.edit.users', compact('user', 'majors', 'cities', 'userTypes', 'userSkills'));
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

        $user = User::find($id);

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin' && Auth::id() != $id) {
            return view('public.403');
        }

        if ($request->input('email') != $user->email) {

            request()->validate([
                'email' => 'unique:users',
            ]);
        }

        if ($request->password) {
            request()->validate([
                'password' => 'required|min:8',
            ]);
            $user->password = Hash::make($request->input('password'));
        } else {
            $user->password = $user->password;
        }

        if (Auth::user()->type == 'admin') {

            $user->type = $request->input('type');
        }


        if (!empty($request->cv)) {
            $cvName = time() . $request->cv->getClientOriginalName();
            $request->cv->move(public_path('attachments'), $cvName);
        } else {
            $cvName = $user['cv'];
        }
        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $user['image'];
        }
        if (!empty($request->cover)) {
            $coverImage = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $coverImage);
        } else {
            $coverImage = $user['coverImage'];
        }

        $request->input('email') ? $user->email = $request->input('email') : null;
        $request->input('phone') ? $user->phone = $request->input('phone') : null;
        $request->input('name') ? $user->name = $request->input('name') : null;
        $request->input('uni') ? $user->uni = $request->input('uni') : null;
        $request->input('lname') ? $user->lname = $request->input('lname') : null;
        $request->input('title') ? $user->title = $request->input('title') : null;
        $request->input('skills') ? $user->skills = $request->input('skills') : null;
        $request->input('nationality') ? $user->nationality = $request->input('nationality') : null;
        $request->input('linkedin') ? $user->linkedin = $request->input('linkedin') : null;
        $request->input('github') ? $user->github = $request->input('github') : null;
        $request->input('twitter') ? $user->twitter = $request->input('twitter') : null;
        $request->input('behance') ? $user->behance = $request->input('behance') : null;
        $request->input('portfolio') ? $user->portfolio = $request->input('portfolio') : null;
        $request->input('address') ? $user->address = $request->input('address') : null;
        $request->input('city') ? $user->city = $request->input('city') : null;
        $request->input('about') ? $user->about = $request->input('about') : null;
        $request->input('major_id') ? $user->major_id = $request->input('major_id') : null;
        $user->cv = $cvName;
        $user->coverImage = $coverImage;
        $user->image = $image;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if (!(Auth::id())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $user = User::find($request->id);
        if ($user->image && $user->image != 'defaultProfile.png') {
            File::delete(public_path('assets/images/profile/' . $user->image));
        }
        if ($user->coverImage && $user->coverImage != 'defultBack.jpg') {
            File::delete(public_path('assets/images/profile/' . $user->coverImage));
        }
        if ($user->cv) {
            File::delete(public_path('attachments' . $user->cv));
        }
        $user->delete();
        return back()->with('success', 'user deleted!');
    }
}
