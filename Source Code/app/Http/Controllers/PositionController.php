<?php

namespace App\Http\Controllers;

use App\Application;
use App\Major;
use App\Position;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class PositionController extends Controller
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


        $companies = DB::table('users')->where('type', 'company')->orWhere('type', 'RequestCompany')->get();
        $majors = Major::orderBy('created_at', 'desc')->get();
        $statuss = ['Open', 'Closed', 'Hidden'];

        // echo "<pre>";
        // echo  json_encode($companies);
        // echo "</pre>";
        return view('admin.add.positions', compact('companies', 'majors', 'statuss'));
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
        if (Auth::user()->type != 'admin'  && Auth::user()->type != 'company' && Auth::user()->type != 'RequestCompany') {
            return view('public.403');
        }



        request()->validate([
            'name' => 'required',
            'majors' => 'required',
            'user_id' => 'required',
        ]);
        $majors = $request->input('majors');
        $majors = implode(',', $majors);

        if (Auth::user()->type == 'company' || Auth::user()->type == 'RequestCompany') {

            $user_id = Auth::user()->user_id;
        }
        if (Auth::user()->type == 'admin') {

            $user_id = $request->input('user_id');
        }
        if (Auth::user()->type == 'RequestCompany' && Auth::user()->type != 'admin') {
            $status = 'Hidden';
        } else {
            $status = $request->input('status');
        }


        if (!empty($request->attachment)) {
            $attachmentName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('attachments'), $attachmentName);
        } else {
            $attachmentName = null;
        }
        if (empty($request->cover)) {
            $cover = 'JobCoverPlaceholder.png';
        } else {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        }

        $position = new Position();

        $position->name = $request->input('name');
        $position->title = $request->input('title');
        $position->skills = $request->input('skills');
        $position->address = $request->input('address');
        $position->city = $request->input('city');
        $position->status = $status;
        $position->cover = $cover;
        $position->about = $request->input('about');
        $position->type = $request->input('type');
        $position->majors = $majors;
        $position->user_id = $user_id;
        $position->attachment = $attachmentName;
        $position->save();


        return back()->with('success', 'Position created successfully.');
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
        if (Auth::user()->type != 'admin'  && Auth::user()->type != 'company' && Auth::user()->type != 'RequestCompany') {
            return view('public.403');
        }


        $position = Position::find($id);

        $positionMajors = $position['majors'];
        $positionMajors = explode(',', $positionMajors);

        $majors = Major::all();
        $statuss = ['Open', 'Closed', 'Hidden'];
        $companies = DB::table('users')->where('type', 'company')->get();
        $positionSkills = explode(',', $position['skills']);
        $types = ['Full time Paid', 'Full time Unpaid', 'Part time Paid', 'Part time Unpaid'];
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        return view('admin.edit.positions', compact('companies', 'majors', 'cities', 'position', 'positionSkills', 'types', 'positionMajors', 'statuss'));
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
        if (Auth::user()->type != 'admin'  && Auth::user()->type != 'company' && Auth::user()->type != 'RequestCompany') {
            return view('public.403');
        }


        $position = Position::find($id);

        if (Auth::user()->type == 'company' || Auth::user()->type == 'RequestCompany') {

            $user_id = Auth::user()->user_id;

            if (Auth::user()->user_id != $position->User_id) {
                return back()->with('danger', 'Blocked!');
            }
        }
        if (Auth::user()->type == 'admin') {

            $user_id = $request->input('user_id');
        }
        if (Auth::user()->type == 'RequestCompany') {
            $status = 'Hidden';
        } else {
            $status = $request->input('status');
        }

        request()->validate([
            'name' => 'required',
            'majors' => 'required',
            'user_id' => 'required',
        ]);


        $majors = $request->input('majors');
        $majors = implode(',', $majors);

        if (!empty($request->attachment)) {
            $attachmentName = time() . '.' . $request->attachment->getClientOriginalExtension();
            $request->attachment->move(public_path('attachments'), $attachmentName);
        } else {
            $attachmentName = $position->attachment;
        }
        if (empty($request->cover)) {
            $cover = $position->cover;
        } else {
            $cover = time() . $request->cover->getClientOriginalName();
            $request->cover->move(public_path('assets/images/profile'), $cover);
        }

        $position->name = $request->input('name');
        $position->title = $request->input('title');
        $position->skills = $request->input('skills');
        $position->address = $request->input('address');
        $position->city = $request->input('city');
        $position->status = $status;
        $position->cover = $cover;
        $position->about = $request->input('about');
        $position->type = $request->input('type');
        $position->majors = $majors;
        $position->user_id = $user_id;
        $position->attachment = $attachmentName;

        $position->save();

        return back()->with('success', 'Position Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $position = Position::find($request->id);


        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin' && Auth::user()->user_id != $position->User_id) {
            return view('public.403');
        }

        $applications = Application::where('applications.Position_id', $position['position_id'])->get();

        foreach ($applications as $application) {
            if ($application->attachment) {
                File::delete(public_path('attachments' . $application->attachment));
            }
            $application->delete();
        }



        if ($position->cover && $position->cover != 'JobCoverPlaceholder.png') {
            File::delete(public_path('assets/images/profile/' . $position->cover));
        }
        if ($position->attachment) {
            File::delete(public_path('attachments' . $position->attachment));
        }
        $position->delete();
        return back()->with('success', 'position deleted!');
    }
}
