<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function __construct()
    {
        // adding middleware to tasks status

        $this->middleware(['permission:types_create'])->only(['create','store']);
        $this->middleware(['permission:types_update'])->only(['edit','update']);
        $this->middleware(['permission:types_read'])->only('index');
        $this->middleware(['permission:types_delete'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate();

        // dd($types);
        return view('pages.types.index',compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.types.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['type' => 'required']);


        Type::create(['type' => $request->type]);

        return redirect()->route('types.index')->with([
            'status' => 'success',
            'massage' => 'type_added_successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        $tasks = $type->tasks()->paginate();
        return view('pages.types.show',compact('type','tasks'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $types = Type::orderBy('type','ASC')
                ->select('id','type')
                ->get();
        } else {
            $types = Type::orderBy('type','ASC')
                ->select('id','type')
                ->where('type','LIKE','%'.$search. '%')
                ->get();
        }

        return response()->json($types);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('pages.types.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate(['type' => 'required']);

        $type->update(['type' => $request->type]);

        return redirect()->route('types.index')->with([
            'status' => 'success',
            'massage' => 'type_updated_successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
}
