<?php

namespace App\Http\Controllers;

use App\Article;
use App\College;
use Illuminate\Http\Request;

use App\Major;
use App\Sstory;
use App\Testimonial;
use App\UniLife;
use App\UniMajor;
use App\University;
use App\User;
use App\VsMajor;
use App\manage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function index()
    {
        $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }



        $testimonials = Testimonial::all();
        $cities = ['Amman', 'Irbid', 'Zarqa', 'Ajloun', 'Jerash', 'Salt', 'Mafraq', 'Karak', "Maan", 'Madaba', 'Tafilah', 'Aqaba'];
        $Companies = User::inRandomOrder()->where([['type', 'company'], ['image', '!=', 'defaultProfile.png']])->limit(8)->get();


        return view('public.home', compact( 'testimonials' , 'cities' , 'Companies' , 'manage'));
    }
    public function AdminDashboard()
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

        $majors = Major::count();
        $users = DB::table('users')->where('type', 'user')->count();
        $admins = DB::table('users')->where('type', 'admin')->count();
        $Companies = DB::table('users')->where('type', 'company')->count();
        $RequestCompanies = DB::table('users')->where('type', 'RequestCompany')->count();

        return view('Admin.show.dashboard', compact('Companies' , 'manage', 'majors', 'users', 'admins', 'RequestCompanies'));
    }
    public function users(Request $request)
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
        $userTypes = ['All', 'user', 'admin', 'company', 'RequestCompany'];
        $directions = ['asc', 'desc'];

        $search = [['type', 'like', '%']];
        $order = 'asc';
        if (($request->direction) && $request->direction != '') {
            $order = $request->direction;
        }
        if (($request->type) && $request->type != 'All') {
            $search[0] = ['users.type', 'like', "$request->type"];
        }

        $users = DB::table('users')
            ->where($search)
            ->orderBy('created_at', $order)->get();

        return view('admin.show.users', compact('users' , 'manage', 'directions', 'userTypes'));
    }
    public function testimonials()
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

        $testimonials = Testimonial::all();
        return view('Admin.show.testimonials', compact('testimonials' , 'manage'));
    }

    public function Companies()
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $companies = DB::table('users')->where('type', 'company')
            ->inRandomOrder()
            ->paginate(9);
        return view('public.companies', compact('companies' , 'manage'));
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
        $myMajor = Major::where('major_id', '=', $user->major_id)->get();


        return view('public.CompanyProfile', compact('user', 'majors' , 'manage', 'statuss', 'cities', 'myMajor'));
    }
    public function myProfile()
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        if (!(Auth::check())) {
            return redirect('/login')->with('info', 'Login first!');
        }
        $user = User::where('user_id', Auth::id())->first();
        $myMajor = Major::where('major_id', '=', $user->major_id)->get();
        $userSkills = explode(',', $user['skills']);
       return view('public.CompanyProfile', compact('user', 'cities',  'myMajor' , 'manage'));

    }
    public function majors()
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

        $majors = Major::all();
        return view('Admin.show.majors', compact('majors' , 'manage'));
    }
    public function colleges()
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
        return view('Admin.show.colleges', compact('colleges' , 'manage'));
    }
    public function universities()
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

        $universities = University::all();
        return view('Admin.show.universities', compact('universities' , 'manage'));
    }
    public function articles()
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

        $articles = Article::all();
        return view('Admin.show.articles', compact('articles' , 'manage'));
    }
    public function uni_lives()
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

        $uni_lives = UniLife::all();
        return view('Admin.show.uni_lives', compact('uni_lives' , 'manage'));
    }
    public function sstories()
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

        $success_stories = Sstory::all();
        return view('Admin.show.success_stories', compact('success_stories' , 'manage'));
    }
    public function vs_majors()
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

        $majors_vs_majors = VsMajor::all();
        return view('Admin.show.majors_vs_majors', compact('majors_vs_majors' , 'manage'));
    }
    public function PublicMajors(Request $request)
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $colleges = College::select('name', 'college_id')
        ->orderBy('name', 'asc')
        ->get();
        $universities = University::select('name', 'university_id')
        ->orderBy('name', 'asc')
        ->get();

        if ( $request->university && $request->university != 'All') {

        $majors = UniMajor::join('majors', 'majors.major_id', 'like', 'uni_majors.major_id')
            ->select('majors.major' , 'majors.major_id', 'majors.image','majors.Ename');
        $result = !isset($request->university)  || $request->university == 'All' ? $majors : $majors->where('uni_majors.university_id', '=', $request->university);
        $majors = $result->orderBy('majors.major', 'asc')->get();
        return view('public.majors', compact('majors', 'colleges', 'universities' , 'manage'));

        }

        $majors = Major::select('major' , 'Ename' , 'major_id', 'image');
        $result = !isset($request->college)  || $request->college == 'All' ? $majors : $majors->where('majors.college_id', '=', $request->college);
        $majors = $result->orderBy('majors.major', 'asc')->get();
        return view('public.majors', compact('majors', 'colleges', 'universities' , 'manage'));
    }
    public function PublicMajor($id)
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $major = Major::where('major_id', $id)->first();
        $sstories = Sstory::where('major_id' , $id)->get();
        if (!($major)) {
            return view('public.404', compact( 'manage'));
        }

        // echo "<pre>";
        // print_r($sstories);

        return view('public.majorPage', compact('major' , 'sstories' , 'manage'));
    }
    public function success_story($id)
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $template = Sstory::where('sstory_id' , $id)->first();
        if (!($template)) {
            return view('public.404' , compact( 'manage'));
        }

        // echo "<pre>";
        // print_r($template);

        return view('public.template', compact( 'template' , 'manage'));
    }
    public function publicArticles()
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $articles = Article::all();
        return view('public.articles', compact('articles', 'manage'));
    }
    public function compare_majors()
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $vs_majors = VsMajor::all();
        return view('public.vs_majors', compact('vs_majors' , 'manage'));
    }
    public function Article($id)
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $template = Article::where('article_id' , $id)->first();
        if (!($template)) {
            return view('public.404' , compact( 'manage'));
        }

        return view('public.template', compact( 'template' , 'manage'));
    }
    public function compare_major($id)
    {
                $manages = manage::where("id" , '=' , '1')->get();
        $manage = [];
        foreach ($manages as $thismanage) {
            $manage = $thismanage ;
        }


        $template = VsMajor::where('vsMajor_id' , $id)->first();
        if (!($template)) {
            return view('public.404' , compact( 'manage'));
        }

        return view('public.template', compact( 'template' , 'manage'));
    }
}

