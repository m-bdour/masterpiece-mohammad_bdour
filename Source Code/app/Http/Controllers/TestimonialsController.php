<?php

namespace App\Http\Controllers;

use App\Testimonial;
use App\manage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestimonialsController extends Controller
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


        return view('admin.add.testimonials' , compact( 'manage'));
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


        if (Auth::user()->type != 'admin') {
            return view('public.403' , compact( 'manage'));
        }

        request()->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = "defaultProfile.png";
        }

        $testimonial = new Testimonial();

        $testimonial->name = $request->input('name');
        $testimonial->title = $request->input('title');
        $testimonial->text = $request->input('text');
        $testimonial->image = $image;
        $testimonial->save();


        return back()->with('success', 'Testimonial created successfully.');
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

        $Testimonial = Testimonial::find($id);

        return view('admin.edit.Testimonial', compact('Testimonial' , 'manage'));
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


        $testimonial = Testimonial::find($id);

        if (Auth::user()->type != 'admin') {
            return view('public.403' , compact( 'manage'));
        }

        request()->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        if (!empty($request->profile)) {
            $image = time() . $request->profile->getClientOriginalName();
            $request->profile->move(public_path('assets/images/profile'), $image);
        } else {
            $image = $testimonial['image'];
        }

        $testimonial->name = $request->input('name');
        $testimonial->title = $request->input('title');
        $testimonial->text = $request->input('text');
        $testimonial->image = $image;
        $testimonial->save();


        return back()->with('success', 'Testimonial Updated successfully.');
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

        $testimonial = Testimonial::find($request->id);
        if ($testimonial->image && $testimonial->image != 'defaultProfile.png') {
            File::delete(public_path('assets/images/profile/' . $testimonial->image));
        }

        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted!');
    }
}
