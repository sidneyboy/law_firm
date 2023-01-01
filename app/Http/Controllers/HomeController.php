<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Nature_of_case;
use App\Models\Cases;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        return view('home', compact('widget'));
    }

    public function category()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $category = Categories::where('user_id', auth()->user()->id)->get();

        return view('category', compact('widget'), [
            'category' => $category,
        ]);
    }

    public function category_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $new = new Categories([
            'category' => strtolower($request->input('category')),
            'user_id' => auth()->user()->id,
            'created_at' => $date,
        ]);

        $new->save();

        return redirect('category')->with('success', 'Successfully Added New Case Category');
    }

    public function category_edit_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Categories::where('id', $request->input('id'))
            ->update([
                'category' => $request->input('category_edit'),
                'updated_at' => $date,
            ]);

        return redirect('category')->with('success', 'Successfully Edited Case Category');
    }

    public function nature_of_case(Request $request)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $nature_of_case = Nature_of_case::where('user_id', auth()->user()->id)->get();

        return view('nature_of_case', compact('widget'), [
            'nature_of_case' => $nature_of_case,
        ]);
    }

    public function nature_of_case_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        $new = new Nature_of_case([
            'nature_of_case' => strtolower($request->input('nature_of_case')),
            'user_id' => auth()->user()->id,
            'created_at' => $date,
        ]);

        $new->save();

        return redirect('nature_of_case')->with('success', 'Successfully Added New Nature of Case');
    }

    public function nature_of_case_edit_process(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Nature_of_case::where('id', $request->input('id'))
            ->update([
                'nature_of_case' => $request->input('nature_of_case_edit'),
                'updated_at' => $date,
            ]);

        return redirect('nature_of_case')->with('success', 'Successfully Edited Nature of Case');
    }

    public function case(Request $request)
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $nature_of_case = Nature_of_case::select('id', 'nature_of_case')->where('user_id', auth()->user()->id)->get();
        $category = Categories::select('id', 'category')->where('user_id', auth()->user()->id)->get();

        return view('case', compact('widget'), [
            'nature_of_case' => $nature_of_case,
            'category' => $category,
        ]);
    }

    public function cases_process(Request $request)
    {
        //return $request->input();

        $new = new Cases([
            'full_name' => $request->input('full_name'),
            'category_id' => $request->input('category_id'),
            'nature_of_case_id' => $request->input('nature_of_case_id'),
            'case_description' => $request->input('case_description'),
            'user_id' => auth()->user()->id,
        ]);

        $new->save();

        
    }
}
