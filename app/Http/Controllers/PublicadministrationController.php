<?php

namespace App\Http\Controllers;

use App\Models\Publicadministration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laratrust\Laratrust;

class PublicAdministrationController extends Controller
{

    public function __construct()
    {
        // adding middleware to public administrations

        $this->middleware(['permission:publicadministrations_create'])->only(['create','store']);
        $this->middleware(['permission:publicadministrations_update'])->only(['edit','update']);
        $this->middleware(['permission:publicadministrations_read'])->only('index');
        $this->middleware(['permission:publicadministrations_delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasPermission('publicadministrations_read_all')) {
            $publicadministrations = Publicadministration::all();
        } else {
            $publicadministrations = Auth::user()->publicadministrations;
        }

        dd($publicadministrations);
        return view('pages.publicadministration.index');
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

        return redirect()->back()->with([
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
        if (!Auth::user()->owns($publicadministration)) {
            abort(403);
        }


        dd($publicadministration->manager);
        // $users = User::all();
        // return view('pages.publicadministration.create',compact('users','publicadministration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publicadministration  $publicadministration
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicadministration $publicadministration)
    {

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
        $request->validate([
            'name' => 'required',
            'user_id' => 'required'
        ]);

        $publicadministration->update([
            'name' => $request->name,
            'user_id' => $request->user_id
        ]);

        return redirect()->back()->with([
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
