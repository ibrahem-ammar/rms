<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laratrust\Laratrust;
use App\Models\Branch;
use App\Models\Publicadministration;
use App\Models\User;

class AdministrationController extends Controller
{

    public function __construct()
    {
        // adding middleware to administrations

        $this->middleware(['permission:administrations_create'])->only(['create','store']);
        $this->middleware(['permission:administrations_update'])->only(['edit','update']);
        $this->middleware(['permission:administrations_read'])->only('index');
        $this->middleware(['permission:administrations_delete'])->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermission('administrations_read_all')) {
            $administrations = Administration::paginate();
        } else {
            $administrations = Auth::user()->administrations()->paginate();
        }

        // dd($administrations);
        return view('pages.administrations.index',compact('administrations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicadministrations = Publicadministration::all();
        $branches = Branch::all();
        $users = User::all();
        return view('pages.administrations.create',compact('publicadministrations','branches','users'));

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
            'branch_id' => 'required',
        ]);


        Administration::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'publicadministration_id' => $request->publicadministration_id,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('administrations.index')->with([
            'status' => 'success',
            'massage' => 'administration_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function show(Administration $administration)
    {
        if (!(Auth::user()->owns($administration) OR Auth::user()->hasPermission('administrations_show_all'))) {
            abort(403);
        }

        $departments = $administration->departments()->paginate();
        // dd($administration,$departments);  
        return view('pages.administrations.show',compact('departments','administration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function edit(Administration $administration)
    {
        if (!(Auth::user()->hasPermission('administrations_update_all') OR Auth::user()->owns($administration))) {
            abort(403);
        }
        // dd($branch->publicadministration->id);
        $users = $publicadministrations = $branches = '';
        if (Auth::user()->hasPermission('administrations_update_all')) {
            $users = User::all() ;
            $publicadministrations = Publicadministration::all() ;
            $branches = Branch::all() ;
        }
        return view('pages.administrations.edit',compact('administration','users','publicadministrations','branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administration $administration)
    {
        $validation_roles = (Auth::user()->hasPermission('administrations_update_all')) ? ['name' => 'required'
            ,'user_id' =>'required','publicadministration_id' =>'required',
            'branch_id' =>'required',] : ['name' => 'required'] ;
        
        $request->validate($validation_roles);

        $data = (Auth::user()->hasPermission('administrations_update_all')) ? [
                    'name' => $request->name,
                    'user_id' => $request->user_id,
                    'publicadministration_id' => $request->publicadministration_id,
                    'branch_id' => $request->branch_id,
                ] : ['name' => $request->name] ;

        $administration->update($data);

        return redirect()->route('administrations.index')->with([
            'status' => 'success',
            'massage' => 'dministration_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administration $administration)
    {
        //
    }
}
