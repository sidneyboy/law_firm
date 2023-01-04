<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categories;
use App\Models\Nature_of_case;
use App\Models\Cases;
use App\Models\Cases_details;
use App\Models\Case_details_attachments;
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

        $category = Categories::get();

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

        $nature_of_case = Nature_of_case::get();

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

        $nature_of_case = Nature_of_case::select('id', 'nature_of_case')->get();
        $category = Categories::select('id', 'category')->get();

        return view('case', compact('widget'), [
            'nature_of_case' => $nature_of_case,
            'category' => $category,
        ]);
    }

    public function cases_process(Request $request)
    {
        $new = new Cases([
            'full_name' => $request->input('full_name'),
            'title' => $request->input('title'),
            // 'category_id' => $request->input('category_id'),
            'nature_of_case_id' => $request->input('nature_of_case_id'),
            // 'case_description' => $request->input('case_description'),
            'court' => $request->input('court'),
            'action' => $request->input('action'),
            'docket_no' => $request->input('docket_no'),
            'order' => $request->input('order'),
            'date_of_order' => $request->input('date_of_order'),
            'presiding_judge' => $request->input('presiding_judge'),
            'user_id' => auth()->user()->id,
        ]);

        $new->save();

        return redirect('list_of_cases')->with('success', 'Successfully Added New Case Profile');
    }

    public function list_of_cases()
    {
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $case = Cases::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $category = Categories::select('id', 'category')->get();
        $nature_of_case = Nature_of_case::select('id', 'nature_of_case')->get();

        return view('list_of_cases', compact('widget'), [
            'case' => $case,
            'category' => $category,
            'nature_of_case' => $nature_of_case,
        ]);
    }

    public function case_client_name_update(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Cases::where('id', $request->input('id'))
            ->update([
                'full_name' => $request->input('full_name'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Client Name');
    }

    public function case_client_title_update(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Cases::where('id', $request->input('id'))
            ->update([
                'title' => $request->input('title'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Title');
    }

    public function case_category_update(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Cases::where('id', $request->input('id'))
            ->update([
                'category_id' => $request->input('category_id'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Category');
    }

    public function case_nature_of_case_update(Request $request)
    {
        //return $request->input();
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d H:i:s');

        Cases::where('id', $request->input('id'))
            ->update([
                'nature_of_case_id' => $request->input('nature_of_case_id'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Nature of Case');
    }

    public function case_description_update(Request $request)
    {
        //return $request->input();
        Cases::where('id', $request->input('id'))
            ->update([
                'case_description' => $request->input('case_description'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Description');
    }

    public function case_remarks_update(Request $request)
    {
        //return $request->input();
        Cases::where('id', $request->input('id'))
            ->update([
                'remarks' => $request->input('remarks'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Remarks');
    }

    public function case_verdict_update(Request $request)
    {
        Cases::where('id', $request->input('id'))
            ->update([
                'decision' => $request->input('verdict'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Verdict');
    }

    public function case_client_action_update(Request $request)
    {
        Cases::where('id', $request->input('id'))
            ->update([
                'action' => $request->input('action'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Case Action');
    }

    public function case_client_docket_no_update(Request $request)
    {
        Cases::where('id', $request->input('id'))
            ->update([
                'docket_no' => $request->input('docket_no'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Docket No');
    }

    public function case_client_order_update(Request $request)
    {
        Cases::where('id', $request->input('id'))
            ->update([
                'order' => $request->input('order'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Order');
    }

    public function case_client_date_of_order_update(Request $request)
    {
        Cases::where('id', $request->input('id'))
            ->update([
                'date_of_order' => $request->input('date_of_order'),
            ]);

        return redirect('list_of_cases')->with('success', 'Successfully Edited Date of Order');
    }

    public function hearing_date_edit(Request $request)
    {
        Cases_details::where('id', $request->input('id'))
            ->update([
                'date_of_hearing' => $request->input('date_of_hearing'),
            ]);

        return redirect()->route('case_details', ['id' => $request->input('case_id')])->with('success', 'Successfully Edited Date of Hearing');
    }

    public function time_of_hearing_edit(Request $request)
    {
        Cases_details::where('id', $request->input('id'))
            ->update([
                'time_of_hearing' => $request->input('time_of_hearing'),
            ]);

        return redirect()->route('case_details', ['id' => $request->input('case_id')])->with('success', 'Successfully Edited Time of Hearing');
    }

    public function nature_of_hearing_edit(Request $request)
    {
        Cases_details::where('id', $request->input('id'))
            ->update([
                'nature_of_hearing' => $request->input('nature_of_hearing'),
            ]);

        return redirect()->route('case_details', ['id' => $request->input('case_id')])->with('success', 'Successfully Edited Nature of Hearing');
    }

    public function plea_edit(Request $request)
    {
        Cases_details::where('id', $request->input('id'))
            ->update([
                'plea' => $request->input('plea'),
            ]);

        return redirect()->route('case_details', ['id' => $request->input('case_id')])->with('success', 'Successfully Edited Plea');
    }

    public function case_details($id)
    {
        $case = Cases::find($id);
        $case_details = Cases_details::where('cases_id', $id)->orderBy('id', 'desc')->get();

        return view('case_details', [
            'case' => $case,
            'case_details' => $case_details,
        ])->with('cases_id', $id);
    }

    public function case_details_process(Request $request)
    {
        //dd($request->all());

        $new_details = new Cases_details([
            'cases_id' => $request->input('cases_id'),
            'date_of_hearing' => $request->input('date_of_hearing'),
            'time_of_hearing' => $request->input('time_of_hearing'),
            'nature_of_hearing' => $request->input('nature_of_hearing'),
            'description' => $request->input('description'),
            'plea' => $request->input('plea'),
        ]);

        $new_details->save();

        if ($request->attachments) {
            foreach ($request->attachments as $key => $attachments) {

                $attachment_name = $attachments->getClientOriginalName();
                $attachments->move(public_path('storage'), $attachment_name);

                $type = $attachments->getClientMimeType();

                $new_attachment = new Case_details_attachments([
                    'attachment_name' => $attachment_name,
                    'case_details_id' => $new_details->id,
                    'type' => $type,
                ]);

                $new_attachment->save();
            }
        }

        return redirect()->route('case_details', ['id' => $request->input('cases_id')])->with('success', 'Successfully Added Case Details');
    }

    public function show_image($id)
    {
        $attachments = Case_details_attachments::find($id);

        return view('show_image', [
            'attachments' => $attachments,
        ]);
    }

    public function show_file($id)
    {
        $attachments = Case_details_attachments::find($id);
        return response()->file(asset('/storage/' . $attachments->attachment_name));
    }

    public function search_client(Request $request)
    {
        //return $request->input();
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        $case = Cases::where('user_id', auth()->user()->id)
            ->Where('full_name', 'like', '%' . $request->input('search') . '%')
            ->orderBy('id', 'desc')->get();

        $category = Categories::select('id', 'category')->get();
        $nature_of_case = Nature_of_case::select('id', 'nature_of_case')->get();

        return view('list_of_cases', compact('widget'), [
            'case' => $case,
            'category' => $category,
            'nature_of_case' => $nature_of_case,
        ]);
    }
}
