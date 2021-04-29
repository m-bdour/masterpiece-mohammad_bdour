<?php

namespace App\Http\Controllers;

use App\Application;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ApplicationController extends Controller
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


        $status = ['Pending', 'Rejected', 'Accepted'];
        $users = DB::table('users')->where('type', 'user')->get();
        $positions = Position::all();

        // echo "<pre>";
        // echo  json_encode($users);
        // echo "</pre>";
        return view('admin.add.applications', compact('users', 'positions', 'status'));
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
        if (Auth::user()->type == 'user') {
            $user_id = Auth::id();
        } else {
            $user_id = $request->user_id;
        }


        request()->validate([
            'Position_id' => 'required',
            'user_id' => 'required',
        ]);

        // check if the application exist
        $repeatedApp = Application::where([
            ['Position_id', $request->Position_id],
            ['user_id', $user_id],
        ])->count();
        if ($repeatedApp && $repeatedApp > 0) {
            return back()->with('danger', 'You already applied for this position');
        }

        if (!empty($request->attachment)) {
            $attachmentName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('attachments'), $attachmentName);
        } else {
            $attachmentName = null;
        }

        if (!$request->status) {
            $status = "Pending";
        } else {
            $status = $request->status;
        }

        $application = new Application();

        $application->coverLetter = $request->input('coverLetter');
        $application->Position_id = $request->Position_id;
        $application->user_id = $user_id;
        $application->status = $status;
        $application->attachment = $attachmentName;
        echo "<pre>";
        print_r($application);
        $application->save();

        return back()->with('success', 'Application created successfully');
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


        $application = Application::find($id);
        $status = ['Pending', 'Rejected', 'Accepted'];


        $users = DB::table('users')->where('type', 'user')->get();
        $positions = Position::all();

        return view('admin.edit.applications', compact('users', 'positions', 'application', 'status'));
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
        if ((Auth::user()->type != 'company' && Auth::user()->type != 'admin')) {
            return view('public.403');
        }

        $application = Application::find($id);

        if (Auth::user()->type == 'company') {
            $application->status = $request->status;
            $application->save();
            return back()->with('success', 'status Updated successfully.');
        }


        request()->validate([
            'Position_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ]);


        // check if the application exist
        if ($application->User_id != $request->user_id && $application->Position_id != $request->Position_id) {

            $repeatedApp = Application::where([
                ['Position_id', $request->Position_id],
                ['user_id', $request->user_id],
            ])->count();
            if ($repeatedApp && $repeatedApp > 0) {
                return redirect('/admin/application')->with('danger', 'This user already applied for this position');
            }
        }

        if (!empty($request->attachment)) {
            $attachmentName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('attachments'), $attachmentName);
        } else {
            $attachmentName = $request->attachment;
        }


        $application->coverLetter = $request->input('coverLetter');
        $application->Position_id = $request->Position_id;
        $application->user_id = $request->user_id;
        $application->status = $request->status;
        $application->attachment = $attachmentName;
        $application->save();

        return back()->with('success', 'Application Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $application = Application::find($request->id);

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if ((Auth::user()->type != 'admin' && Auth::id() != $application->User_id  && Auth::user()->type != "company")) {
            return view('public.403');
        }

        if ($application->attachment) {
            File::delete(public_path('attachments' . $application->attachment));
        }
        $application->delete();
        return back()->with('success', 'application deleted!');
    }
}
