<?php

namespace App\Http\Controllers;

use App\Major;
use App\UniMajor;
use App\University;
use App\manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class universityController extends Controller
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
        $majors = Major::select('major', 'major_id')->get();
        return view('admin.add.universities', compact('majors' , 'manage'));
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

        $university = new University();
        $university->name = $request->input('name');
        $university->Ename = $request->input('Ename');
        $university->description = $request->input('description');
        $university->title = $request->input('title');
        $university->keywords = $request->input('keywords');
        $university->about = $request->input('about');
        $university->cover = $cover;
        $university->image = $image;
        $university->save();

        $last = DB::table('universities')->latest()->first();
        $majors = $request->input('majors');
        foreach ($majors as  $major) {
            $uniMajor = new UniMajor();
            $uniMajor->major_id   = "$major";
            $uniMajor->university_id   = $last->university_id;
            $uniMajor->save();
        }

        return redirect('/admin/university')->with('success', 'university created successfully.');
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

        $university = University::find($id);
        $unimajors = UniMajor::where('university_id', '=', $university->university_id)
        ->select('major_id')->get();
        $majorsArr = [];
        foreach ($unimajors as $value) {
            array_push($majorsArr,$value->major_id);
        }
        $majors = Major::select('major', 'major_id')->get();
        $keywords  = explode(',', $university['keywords']);
        return view('admin.edit.universities', compact('university' , 'keywords' , 'majors' , 'majorsArr' , 'manage'));
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


        $university = University::find($id);
        if ($request->name != $university->name) {
            request()->validate([
                'name' => 'required|unique:universities',
            ]);
        }

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $university['image'];
        }
        if (!empty($request->cover)) {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        } else {
            $cover = $university['cover'];
        }

        $university->name = $request->input('name');
        $university->Ename = $request->input('Ename');
        $university->description = $request->input('description');
        $university->title = $request->input('title');
        $university->keywords = $request->input('keywords');
        $university->about = $request->input('about');
        $university->cover = $cover;
        $university->image = $image;
        $university->save();

        UniMajor::where('university_id', $id)->delete();
        $majors = $request->input('majors');
        foreach ($majors as  $major) {
            $uniMajor = new UniMajor();
            $uniMajor->major_id   = "$major";
            $uniMajor->university_id   = $id;
            $uniMajor->save();
        }

        return back()->with('success', 'university updated successfully.');
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

        $university = University::find($request->id);

        DB::table('uni_majors')->where('university_id', '=', $request->id)->delete();

        $university->delete();
        return back()->with('success', 'university deleted!');
    }
}
