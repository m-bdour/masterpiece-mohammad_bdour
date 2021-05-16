<?php

namespace App\Http\Controllers;

use App\VsMajor;
use App\manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class vs_majorController extends Controller
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
        return view('admin.add.vs_majors' , compact( 'manage'));
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
            'name' => 'required',
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

        $vsMajor = new VsMajor();
        $vsMajor->name = $request->input('name');
        $vsMajor->Ename = $request->input('Ename');
        $vsMajor->description = $request->input('description');
        $vsMajor->title = $request->input('title');
        $vsMajor->keywords = $request->input('keywords');
        $vsMajor->about = $request->input('about');
        $vsMajor->cover = $cover;
        $vsMajor->image = $image;
        $vsMajor->save();

        return redirect('/admin/major_vs_major')->with('success', 'major vs major created successfully.');
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

        $vsMajor = VsMajor::find($id);
        $keywords  = explode(',', $vsMajor['keywords']);
        return view('admin.edit.major_vs_major', compact('vsMajor' , 'keywords' , 'manage'));
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


        $vsMajor = vsMajor::find($id);
        if ($request->name != $vsMajor->name) {
            request()->validate([
                'name' => 'required|unique:vsMajors',
            ]);
        }

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $vsMajor['image'];
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $vsMajor['cover'];
        }

        $vsMajor->name = $request->input('name');
        $vsMajor->Ename = $request->input('Ename');
        $vsMajor->description = $request->input('description');
        $vsMajor->title = $request->input('title');
        $vsMajor->keywords = $request->input('keywords');
        $vsMajor->about = $request->input('about');
        $vsMajor->cover = $cover;
        $vsMajor->image = $image;
        $vsMajor->save();

        return back()->with('success', 'major vs major updated successfully.');
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

        $VsMajor = VsMajor::find($request->id);

        $VsMajor->delete();
        return back()->with('success', 'major vs major deleted!');
    }
}
