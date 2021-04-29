<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

use App\Major;
use App\Position;
use App\Testimonial;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function index()
    {

        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $majors = Major::all();
        $testimonials = Testimonial::all();
        $positions = Position::join('users', 'users.user_id', '=', 'positions.User_id')
            ->select('positions.*', 'users.name as company_name', 'users.city as company_city')
            ->where('positions.status', '!=', 'Hidden')
            ->orderBy('created_at', 'desc')->limit(5)->get();
        $Companies = User::inRandomOrder()->where([['type', 'company'], ['image', '!=', 'defaultProfile.png']])->limit(8)->get();

        return view('public.home', compact('Companies', 'majors', 'cities', 'positions', 'testimonials'));
    }
    public function AdminDashboard()
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $majors = Major::count();
        $users = DB::table('users')->where('type', 'user')->count();
        $admins = DB::table('users')->where('type', 'admin')->count();
        $Companies = DB::table('users')->where('type', 'company')->count();
        $RequestCompanies = DB::table('users')->where('type', 'RequestCompany')->count();
        $positions = Position::count();
        $applications = Application::count();

        return view('Admin.show.dashboard', compact('Companies', 'majors', 'users', 'admins', 'RequestCompanies', 'positions', 'applications'));
    }
    public function users()
    {
        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $users = User::all();
        // $users->appends($request->all());
        return view('Admin.show.users', compact('users'));
    }
    public function testimonials()
    {
        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $testimonials = Testimonial::all();
        return view('Admin.show.testimonials', compact('testimonials'));
    }
    public function majors()
    {
        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $majors = Major::all();
        return view('Admin.show.majors', compact('majors'));
    }
    public function positions()
    {
        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $positions = Position::join('users', 'users.user_id', '=', 'positions.User_id')
            ->select('positions.*', 'users.name as company_name', 'users.image as company_image')
            ->get();
        // echo '<pre>';
        // print_r(json_decode($positions));

        return view('Admin.show.positions', compact('positions'));
    }
    public function applications()
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin') {
            return view('public.403');
        }

        $applications = Application::join('users', 'users.user_id', '=', 'applications.User_id')
            ->join('positions', 'positions.position_id', '=', 'applications.Position_id')
            ->select('applications.*', 'positions.*', 'users.name as user_name', 'users.image as user_image')
            ->get();

        return view('Admin.show.applications', compact('applications'));
    }
    public function CompanyApplications(Request $request)
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin' && Auth::user()->type != 'company') {
            return view('public.403');
        }

        if (!($request->id) || $request->id == 'All') {
            $id = '%';
        } else {
            $id = $request->id;
        }
        $status = ['Pending', 'Rejected', 'Accepted'];

        $applications = DB::table('applications')
            ->join('users', 'users.user_id', '=', 'applications.User_id')
            ->join('positions', 'positions.position_id', '=', 'applications.Position_id')
            ->select('users.name as user_name', 'users.lname as user_lname', 'users.cv as user_cv',   'users.email as user_email',  'users.major_id as user_major_id', 'users.image as user_image', 'applications.*', 'positions.name as position_name', 'positions.title as position_title')
            ->where([['positions.User_id', Auth::id()], ['applications.position_id', 'like', "$id"]])->get();

        $positions = Position::where('User_id', Auth::id())->get();
        return view('public.applications', compact('applications', 'status', 'positions'));
    }
    public function jobs(Request $request)
    {
        if ($request->cities == 'All') {
            $request->cities = '%';
        } else {
            $request->cities = '%' . $request->cities . '%';
        }
        if ($request->types == 'All') {
            $request->types = '%';
        } else {
            $request->types = '%' . $request->types . '%';
        }
        if ($request->majors == 'All') {
            $request->majors = '%';
        } else {
            $request->majors = '%' . $request->majors . '%';
        }
        $jobs = Position::join('users', 'users.user_id', '=', 'positions.User_id')
            ->select('positions.*', 'users.name as company_name', 'users.image as company_image', 'users.city as company_city')
            ->where([['positions.status', '!=', 'Hidden'], ['positions.majors', 'like',  $request->majors], ['positions.type', 'like',  $request->types], ['positions.city', 'like',  $request->cities]])
            ->paginate(8);
        $jobs->appends($request->all());
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $majors = Major::all();

        return view('public.jobs', compact('jobs', 'cities', 'majors'));
    }
    public function trainees(Request $request)
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        if (Auth::user()->type != 'admin' && Auth::user()->type != "company") {
            return view('public.403');
        }

        $search = [['users.type', 'user']];
        if (($request->city) && $request->city != 'All') {
            $city = $request->city;
            $search[1] = ['users.city', 'like', "$city"];
        }
        if (($request->skill) && $request->skill != '') {
            $skill = '%' . $request->skill . '%';
            $search[2] = ['users.skills', 'like', "$skill"];
        }
        if (($request->major) && $request->major != 'All') {
            $major = $request->major;
            $search[3] = ['users.major_id', 'like', "$major"];
        }
        // WHERE columnname LIKE '%'
        $trainees = DB::table('users')->join('majors', 'majors.major_id', '=', 'users.major_id')
            ->select('users.*', 'majors.major',)
            ->where($search)->paginate(6);
        $trainees->appends($request->all());
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $majors = Major::all();

        return view('public.trainees', compact('trainees', 'cities', 'majors'));
    }

    public function Companies()
    {
        $companies = DB::table('users')->where('type', 'company')->paginate(9);
        return view('public.companies', compact('companies'));
    }
    public function profile($id)
    {

        $user = User::where('user_id', $id)->first();
        if ($user->type != "company") {
            if (Auth::check()) {

                if ((Auth::user()->type != 'company' && Auth::user()->type != 'admin')) {
                    return redirect('/profile')->with('info', 'your profile');
                }
            } else {
                return redirect('/login')->with('info', 'Login first!');
            }
        }


        // $user = User::where('user_id', Auth::id())->first();
        $majors = Major::all();
        $userSkills = explode(',', $user['skills']);
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $statuss = ['Open', 'Closed', 'Hidden'];


        if ($user['type'] == 'company' || $user->type == 'RequestCompany') {
            $positions = Position::where('User_id', $user['user_id'])->get();
            return view('public.CompanyProfile', compact('user', 'positions', 'majors', 'statuss', 'cities'));
        } else {
            $applications = Application::where('applications.User_id', $user['user_id'])
                ->join('users', 'users.user_id', '=', 'applications.User_id')
                ->join('positions', 'positions.position_id', '=', 'applications.Position_id')
                ->select('applications.*', 'positions.name as position_name', 'positions.type as position_type',  'users.name as user_name', 'users.image as user_image')->get();
            return view('public.traineeProfile', compact('user', 'applications',  'majors', 'cities', 'userSkills'));
        }
    }
    public function myProfile()
    {

        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }


        $user = User::where('user_id', Auth::id())->first();
        $majors = Major::all();
        $myMajor = Major::where('major_id', '=', $user->major_id)->get();
        $userSkills = explode(',', $user['skills']);
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];


        if ($user['type'] == 'company' || $user->type == 'RequestCompany') {
            $statuss = ['Open', 'Closed', 'Hidden'];
            $positions = Position::where('User_id', $user['user_id'])->get();
            return view('public.CompanyProfile', compact('user', 'positions', 'cities', 'majors', 'statuss',));
        } else {
            $applications = Application::where('applications.User_id', $user['user_id'])
                ->join('users', 'users.user_id', '=', 'applications.User_id')
                ->join('positions', 'positions.position_id', '=', 'applications.Position_id')
                ->select('applications.*', 'positions.name as position_name', 'positions.type as position_type',  'users.name as user_name', 'users.image as user_image')->get();
            return view('public.traineeProfile', compact('user', 'applications',  'majors', 'cities', 'userSkills', 'myMajor'));
        }
    }
    public function job($id)
    {

        $position = Position::where('position_id', $id)->first();
        if ($position['status'] == 'Hidden' && Auth::id() != $position->User_id) {
            return view('public.403');
        }

        $similarPositions = Position::where('User_id', $position->User_id)->limit(2)->get();
        $company = User::where('user_id', $position->User_id)->first();
        $positionSkills = explode(',', $position['skills']);

        $positionMajors = $position['majors'];
        $positionMajors = explode(',', $positionMajors);
        $majors = Major::all();
        $statuss = ['Open', 'Closed', 'Hidden'];
        $types = ['Full time Paid', 'Full time Unpaid', 'Part time Paid', 'Part time Unpaid'];
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];

        if (Auth::check() && Auth::id() == $position->User_id) {
            $applications = Application::where('applications.Position_id', $position['position_id '])
                ->join('users', 'users.user_id', '=', 'applications.User_id')
                ->join('positions', 'positions.position_id', '=', 'applications.Position_id')
                ->select('applications.*', 'positions.name as position_name', 'positions.type as position_type',  'users.name as user_name', 'users.image as user_image')->get();
            return view('public.jobPage', compact('majors', 'statuss', 'positionSkills', 'types', 'cities', 'position', 'applications', 'similarPositions', 'company', 'positionMajors'));
        }

        return view('public.jobPage', compact('position', 'similarPositions', 'company', 'positionSkills', 'positionMajors'));
    }
}
