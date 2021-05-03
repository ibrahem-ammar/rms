<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use App\Models\Publicadministration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermission('branches_read_all')) {
            $branches = Branch::paginate();
        } else {
            $branches = Auth::user()->branches()->paginate();
        }

        // dd($branches);
        return view('pages.branches.index',compact('branches'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicadministrations = Publicadministration::all();
        $users = User::all();
        return view('pages.branches.create',compact('publicadministrations','users'));
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
            'publicadministration_id' => 'required'
        ]);


        Branch::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'publicadministration_id' => $request->publicadministration_id,
        ]);

        return redirect()->route('branches.index')->with([
            'status' => 'success',
            'massage' => 'branche_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        if (!(Auth::user()->owns($branch) OR Auth::user()->hasPermission('branches_show_all'))) {
            abort(403);
        }

        $administrations = $branch->administrations()->paginate();
        // dd($branch,$administrations);  
        return view('pages.branches.show',compact('administrations','branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        if (!(Auth::user()->hasPermission('branches_update_all') OR Auth::user()->owns($branch))) {
            abort(403);
        }
        // dd($branch->publicadministration->id);

        if (Auth::user()->hasPermission('branches_update_all')) {
            $users = User::all() ;
            $publicadministrations = Publicadministration::all() ;
        }

        return view('pages.branches.edit',compact('branch','users','publicadministrations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $validation_roles = (Auth::user()->hasPermission('branches_update_all')) ? ['name' => 'required'
            ,'user_id' =>'required','publicadministration_id' =>'required'] : ['name' => 'required'] ;
        
        $request->validate($validation_roles);

        $data = (Auth::user()->hasPermission('branches_update_all')) ? [
                    'name' => $request->name,
                    'user_id' => $request->user_id,
                    'publicadministration_id' => $request->publicadministration_id
                ] : ['name' => $request->name] ;

        $branch->update($data);

        return redirect()->route('branches.index')->with([
            'status' => 'success',
            'massage' => 'branch_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
