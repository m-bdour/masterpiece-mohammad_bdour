<?php

namespace App\Http\Controllers;

use App\manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class manageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $manage = manage::find($id);
        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403' , compact( 'manage'));
        }

        $homekeywords  = explode(',', $manage['homekeywords']);
        $lifekeywords  = explode(',', $manage['lifekeywords']);
        return view('admin.edit.manage', compact('manage' , 'homekeywords' , 'lifekeywords'));
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
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403' , compact( 'manage'));
        }


        $manage = manage::find($id);
        // request()->validate([
        //     'manage' => 'required|unique:manages',
        //     ]);


        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $manage['homeimage'];
        }

        $manage->homedescription = $request->input('homedescription');
        $manage->hometitle = $request->input('hometitle');
        $manage->lifetitle = $request->input('lifetitle');
        $manage->linkedin = $request->input('linkedin');
        $manage->facebook = $request->input('facebook');
        $manage->twitter = $request->input('twitter');
        $manage->instagram = $request->input('instagram');
        $manage->homekeywords = $request->input('homekeywords');
        $manage->lifekeywords = $request->input('lifekeywords');
        $manage->lifedescription = $request->input('lifedescription');
        $manage->contactinfo = $request->input('contactinfo');
        $manage->hometopdiscription = $request->input('hometopdiscription');
        $manage->homebottomdiscription = $request->input('homebottomdiscription');
        $manage->homeimage = $cover;
        $manage->save();

        return back()->with('success', 'Qorrah updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
