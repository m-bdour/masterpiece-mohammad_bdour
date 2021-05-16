<?php

namespace App\Http\Controllers;

use App\College;
use App\Major;
use App\University;
use App\manage;

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
        $colleges = College::all();

        return view('admin.add.majors' , compact('colleges' , 'manage'));
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
            'major' => 'required|unique:majors',
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

        $major = new Major();
        $major->major = $request->input('major');
        $major->Ename = $request->input('Ename');
        $major->description = $request->input('description');
        $major->title = $request->input('title');
        $major->keywords = $request->input('keywords');
        $major->about = $request->input('about');
        $major->sectors = $request->input('sectors');
        $major->skills = $request->input('skills');
        $major->courses = $request->input('courses');
        $major->findJob = $request->input('findJob');
        $major->education = $request->input('education');
        $major->references = $request->input('references');
        $major->college_id  = $request->college_id ;
        $major->cover = $cover;
        $major->image = $image;
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

        $colleges = College::all();
        $major = Major::find($id);
        $keywords  = explode(',', $major['keywords']);
        return view('admin.edit.majors', compact('major' , 'colleges' , 'keywords' , 'manage'));
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


        $major = Major::find($id);
        if ($request->major != $major->major) {
            request()->validate([
                'major' => 'required|unique:majors',
            ]);
        }

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $major['image'];
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $major['cover'];
        }

        $major->major = $request->input('major');
        $major->Ename = $request->input('Ename');
        $major->description = $request->input('description');
        $major->title = $request->input('title');
        $major->keywords = $request->input('keywords');
        $major->about = $request->input('about');
        $major->sectors = $request->input('sectors');
        $major->skills = $request->input('skills');
        $major->courses = $request->input('courses');
        $major->findJob = $request->input('findJob');
        $major->education = $request->input('education');
        $major->references = $request->input('references');
        $major->college_id  = $request->college_id ;
        $major->cover = $cover;
        $major->image = $image;
        $major->save();

        return back()->with('success', 'Major updated successfully.');
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


        $major = Major::find($request->id);

        $major->delete();
        return back()->with('success', 'major deleted!');
    }
}
