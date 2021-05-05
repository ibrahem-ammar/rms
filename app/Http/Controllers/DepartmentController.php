<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\USer;
use App\Models\Administration;
use Illuminate\Support\Facades\Auth;
use App\Models\Publicadministration;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermission('departments_read_all')) {
            $departments = Department::paginate();
        } else {
            $departments = Auth::user()->departments()->paginate();
        }

        // dd($departments);
        return view('pages.departments.index',compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicadministrations = Publicadministration::all();
        $administrations = Administration::all();
        $users = User::all();
        return view('pages.departments.create',compact('publicadministrations','administrations','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'user_id' => 'required',
            'publicadministration_id' => 'required',
            'administration_id' => 'required',
        ]);


        Department::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'publicadministration_id' => $request->publicadministration_id,
            'administration_id' => $request->administration_id,
        ]);

        return redirect()->route('departments.index')->with([
            'status' => 'success',
            'massage' => 'department_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        if (!(Auth::user()->owns($department) OR Auth::user()->hasPermission('administrations_show_all'))) {
            abort(403);
        }

        // $departments = $administration->departments()->paginate();
        // // dd($administration,$departments);
        // return view('pages.administrations.show',compact('departments','administration'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $departments = Department::orderBy('name','ASC')
                ->select('id','name')
                ->get();
        } else {
            $departments = Department::orderBy('name','ASC')
                ->select('id','name')
                ->where('name','LIKE','%'.$search. '%')
                ->get();
        }

        return response()->json($departments);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {

        if (!(Auth::user()->hasPermission('administrations_update_all') OR Auth::user()->owns($department))) {
            abort(403);
        }
        // dd($branch->publicadministration->id);
        $users = $publicadministrations = $administrations = '';
        if (Auth::user()->hasPermission('administrations_update_all')) {
            $publicadministrations = Publicadministration::all();
            $administrations = Administration::all();
            $users = User::all();
        }
        return view('pages.departments.edit',compact('department','administrations','users','publicadministrations'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validation_roles = (Auth::user()->hasPermission('departments_update_all')) ? ['name' => 'required'
            ,'user_id' =>'required','publicadministration_id' =>'required',
            'administration_id' =>'required',] : ['name' => 'required'] ;

        $request->validate($validation_roles);

        $data = (Auth::user()->hasPermission('departments_update_all')) ? [
                    'name' => $request->name,
                    'user_id' => $request->user_id,
                    'publicadministration_id' => $request->publicadministration_id,
                    'administration_id' => $request->administration_id,
                ] : ['name' => $request->name] ;

        $department->update($data);

        return redirect()->route('departments.index')->with([
            'status' => 'success',
            'massage' => 'department_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
