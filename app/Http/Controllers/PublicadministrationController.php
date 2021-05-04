<?php

namespace App\Http\Controllers;

use App\Models\Publicadministration;
use App\Models\User;
use App\DataTables\PublicadministrationDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laratrust\Laratrust;

class PublicAdministrationController extends Controller
{

    public function __construct()
    {
        // adding middleware to public administrations

        $this->middleware(['permission:publicadministrations_create'])->only(['create','store']);
        $this->middleware(['permission:publicadministrations_update|publicadministrations_update_all'])->only(['edit','update']);
        $this->middleware(['permission:publicadministrations_read|publicadministrations_read_all'])->only('index');
        $this->middleware(['permission:publicadministrations_delete|publicadministrations_delete_all'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublicadministrationDataTable $publicadministrations)
    {

        // if (Auth::user()->hasPermission('publicadministrations_read_all')) {
        //     $publicadministrations = Publicadministration::paginate();
        // } else {
        //     $publicadministrations = Auth::user()->publicadministrations()->paginate();
        // }

        // dd($publicadministrations);
        return $publicadministrations->render('pages.publicadministrations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pages.publicadministrations.create',compact('users'));
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
            'user_id' => 'required'
        ]);


        Publicadministration::create([
            'name' => $request->name,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('publicadministrations.index')->with([
            'status' => 'success',
            'massage' => 'publicadministration_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publicadministration  $publicadministration
     * @return \Illuminate\Http\Response
     */
    public function show(Publicadministration $publicadministration)
    {
        if (!(Auth::user()->owns($publicadministration) OR Auth::user()->hasPermission('publicadministrations_show_all'))) {
            abort(403);
        }

        $branches = $publicadministration->branches()->paginate();
        $administrations = $publicadministration->administrations()->paginate();
        $departments = $publicadministration->departments()->paginate();
        // dd($publicadministration,$branches,$administrations,$departments);
        return view('pages.publicadministrations.show',compact('publicadministration','branches','administrations','departments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicadministration  $publicadministration
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicadministration $publicadministration)
    {
        if (!(Auth::user()->hasPermission('publicadministrations_update_all') OR Auth::user()->owns($publicadministration))) {
            abort(403);
        }
        // dd($publicadministration->manager->id);

        $users = (Auth::user()->hasPermission('publicadministrations_update_all')) ? User::all() : '' ;

        return view('pages.publicadministrations.edit',compact('users','publicadministration'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publicadministration  $publicadministration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicadministration $publicadministration)
    {
        $validation_roles = (Auth::user()->hasPermission('publicadministrations_update_all')) ? ['name' => 'required','user_id' =>'required'] : ['name' => 'required'] ;

        $request->validate($validation_roles);

        $data = (Auth::user()->hasPermission('publicadministrations_update_all')) ? [
                    'name' => $request->name,
                    'user_id' => $request->user_id
                ] : ['name' => $request->name] ;

        $publicadministration->update($data);

        return redirect()->route('publicadministrations.index')->with([
            'status' => 'success',
            'massage' => 'publicadministration_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicadministration  $publicadministration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicadministration $publicadministration)
    {
        //
    }
}
