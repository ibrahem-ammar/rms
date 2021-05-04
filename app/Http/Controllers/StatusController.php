<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        // adding middleware to tasks status

        $this->middleware(['permission:statuses_create'])->only(['create','store']);
        $this->middleware(['permission:statuses_update'])->only(['edit','update']);
        $this->middleware(['permission:statuses_read'])->only('index');
        $this->middleware(['permission:statuses_delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::paginate();

        // dd($statuses);
        return view('pages.statuses.index',compact('statuses'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['status' => 'required']);


        Status::create(['status' => $request->status]);

        return redirect()->route('statuses.index')->with([
            'status' => 'success',
            'massage' => 'status_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        $tasks = $status->tasks()->paginate();
        return view('pages.statuses.show',compact('status','tasks'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $statuses = Status::orderBy('status','ASC')
                ->select('id','status')
                ->get();
        } else {
            $statuses = Status::orderBy('status','ASC')
                ->select('id','status')
                ->where('status','LIKE','%'.$search. '%')
                ->get();
        }

        return response()->json($statuses);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        return view('pages.statuses.edit',compact('status'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $request->validate(['status' => 'required']);

        $status->update(['status' => $request->status]);

        return redirect()->route('statuses.index')->with([
            'status' => 'success',
            'massage' => 'status_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
