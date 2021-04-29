<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class MajorController extends Controller
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

        return view('admin.add.majors');
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
            'major' => 'required|unique:majors',
        ]);


        $major = new Major();
        $major->major = $request->input('major');
        $major->College = $request->input('College');
        $major->save();

        return redirect('/admin/major')->with('success', 'Major created successfully.');
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
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }


        $major = Major::find($id);
        return view('admin.edit.majors', compact('major'));
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


        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }


        $major = Major::find($id);
        if ($request->major != $major->major) {
            request()->validate([
                'major' => 'required|unique:majors',
            ]);
        }

        $major->major = $request->input('major');
        $major->College = $request->input('College');
        $major->save();

        return redirect('/admin/majors')->with('success', 'Major created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }


        $major = Major::find($request->id);

        $major->delete();
        return back()->with('success', 'major deleted!');
    }
}
