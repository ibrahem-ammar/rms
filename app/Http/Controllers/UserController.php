<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;
use App\Models\Administration;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Publicadministration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public function __construct()
    {
        // adding middleware to users

        $this->middleware(['permission:users_create'])->only(['create','store']);
        $this->middleware(['permission:users_update'])->only(['edit','update']);
        $this->middleware(['permission:users_read'])->only('index');
        $this->middleware(['permission:users_delete'])->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $userDataTable->render('pages.users.show');
        $modelsKeys = array_keys(Config::get('laratrust.user_models'));
        $modelKey = $request->get('model') ?? $modelsKeys[0] ?? null;
        $userModel = Config::get('laratrust.user_models')[$modelKey] ?? null;

        if (!$userModel) {
            abort(404);
        }

        return View::make('pages.users.index', [
            'models' => $modelsKeys,
            'modelKey' => $modelKey,
            'users' => $userModel::query()
                ->withCount(['roles', 'permissions'])
                ->simplePaginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = Auth::user();

        // if ($user->hasRole(['super_admin','admin'])) {
        //     $publicadministrations = Publicadministration::all();
        //     $administrations = Administration::all();
        //     $departments = Department::all();
        //     $branches = Branch::all();
        // } else {
        //     $publicadministrations = $user->publicadministrations;
        //     $dministrations = $user->administrations;
        //     $departments = $user->departments;
        //     $branches = $user->branches;
        // }

        // dd($publicadministrations,$dministrations,$departments,$branches);

        $permissions = Permission::all();
        $roles = Role::all();

        return view('pages.users.create',compact('permissions','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!Auth::user()->owns($user)) {
            abort(403);
        }


        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
