<?php

namespace App\Http\Controllers;

use App\Major;
use App\Sstory;
use App\manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class sstoryController extends Controller
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
            return view('public.403' , compact( 'manage'));
        }
        $majors = Major::all();
        return view('admin.add.sstories', compact('majors' , 'manage'));
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

        $sstory = new Sstory();
        $sstory->name = $request->input('name');
        $sstory->Ename = $request->input('Ename');
        $sstory->description = $request->input('description');
        $sstory->title = $request->input('title');
        $sstory->keywords = $request->input('keywords');
        $sstory->about = $request->input('about');
        $sstory->major_id  = $request->major_id;
        $sstory->cover = $cover;
        $sstory->image = $image;
        $sstory->save();

        return redirect('/admin/success_story')->with('success', 'Success story created successfully.');
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

        $sstory = Sstory::find($id);
        $keywords  = explode(',', $sstory['keywords']);
        return view('admin.edit.success_story', compact('sstory' , 'keywords' , 'manage'));
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


        $sstory = Sstory::find($id);
        if ($request->name != $sstory->name) {
            request()->validate([
                'name' => 'required|unique:sstories',
            ]);
        }

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $sstory['image'];
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $sstory['cover'];
        }

        $sstory->name = $request->input('name');
        $sstory->Ename = $request->input('Ename');
        $sstory->description = $request->input('description');
        $sstory->title = $request->input('title');
        $sstory->keywords = $request->input('keywords');
        $sstory->about = $request->input('about');
        $sstory->major_id  = $request->major_id;
        $sstory->cover = $cover;
        $sstory->image = $image;
        $sstory->save();

        return back()->with('success', 'success story updated successfully.');
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


        $sstory = Sstory::find($request->id);

        $sstory->delete();
        return back()->with('success', 'Success story deleted!');
    }
}
