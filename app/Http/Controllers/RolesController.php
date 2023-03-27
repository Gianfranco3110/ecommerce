<?php

namespace App\Http\Controllers;

// use Spatie\Permission\Models\Role;
use App\Models\Roles;
// use App\Http\Requests\StorerolesRequest;
// use App\Http\Requests\UpdaterolesRequest;
// use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorerolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdaterolesRequest  $request
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }


    public function roles(){
        $roles = Roles::all();
        return view('customers.roles')->with('roles',$roles);
    }

    public function rolesEdit(Roles $role){
        return view('customers.rolEdit', compact('role'));
    }

    public function rolesUpdate(Request $request, Role $role){
        $request->validate([
            'name' =>'required|max:50',
        ],[],[
            'name' => 'nombre',
        ]);
        $role->update([
            'slug'=>$request->name
        ]);
        return redirect()->route('roles.index');

        // $roles = Roles::find($id);
        // $roles->name = $request->name;
        // $roles->rol = $request->rol;
        // $roles->save();
        // // dd("enterado");
        // $message = "Datos cargados correctamente";
        // return view('customers.rolEdit')->with('rolUnico',$roles)->with('message',$message);
    }
    public function rolesDelete(Request $request, $id){
        $roles = Roles::find($id);
        $roles->delete();
        // dd("enterado");
        $message = "Eliminado con exito";
        return redirect()->route('rolex.index');
    }


}
