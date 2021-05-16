<?php

namespace App\Http\Controllers;

use App\College;
use App\manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class collegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        return view('admin.add.colleges' , compact( 'manage'));
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

        request()->validate([
            'name' => 'required|unique:colleges',
        ]);


        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = null;
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = null;
        }

        $college = new College();
        $college->name = $request->input('name');
        $college->Ename = $request->input('Ename');
        $college->description = $request->input('description');
        $college->title = $request->input('title');
        $college->keywords = $request->input('keywords');
        $college->about = $request->input('about');
        $college->cover = $cover;
        $college->image = $image;
        $college->save();

        return redirect('/admin/college')->with('success', 'college created successfully.');
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

        $college = College::find($id);
        $keywords  = explode(',', $college['keywords']);
        return view('admin.edit.colleges', compact('college' , 'keywords' , 'manage'));
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


        $college = College::find($id);
        if ($request->name != $college->name) {
            request()->validate([
                'name' => 'required|unique:colleges',
            ]);
        }

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $college['image'];
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $college['cover'];
        }

        $college->name = $request->input('name');
        $college->Ename = $request->input('Ename');
        $college->description = $request->input('description');
        $college->title = $request->input('title');
        $college->keywords = $request->input('keywords');
        $college->about = $request->input('about');
        $college->cover = $cover;
        $college->image = $image;
        $college->save();

        return back()->with('success', 'college updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
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


        $college = College::find($request->id);

        $college->delete();
        return back()->with('success', 'college deleted!');
    }
}
