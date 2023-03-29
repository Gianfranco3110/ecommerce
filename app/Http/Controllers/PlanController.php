<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $plan =  Plan::select('plans.id','plans.name','plans.amount','users.name as nombre_user','users.last_name as segundo_nombre')
        ->join('users', 'users.id','=', 'plans.user_id')->get();

        return view('plan.index',compact('plan'));
    }

    public function add()
    {
        $User = User::all()->except(auth()->user()->id);
        return view('plan.add',compact('User'));
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        $User = User::find($plan->user_id);
        $User_select = User::all()->except(auth()->user()->id);
        return view('plan.edit',compact('User','plan','User_select'));
    }

    public function store(Request $request)
    {

        $request->validate([

            'name' =>'required',
            'amount' => 'required|numeric',
            'user_id' => 'required',
        ],[],[
            'name' => 'Nombre',
            'amount' => 'Cantidad',
            'user_id' => 'Usuario',
        ]);

        if ($request->id)
        {
            $model = Plan::findOrFail($request->id);
            $accion = "Editado";

        }
        else
        {
            $model = new Plan;
            $accion = " Creado";
        }

        $model->fill($request->all());
        $model->save();

        return redirect()->route('plan.index')->with('mensaje', "Plan {$accion} correctamente");
    }

    public function destroy($id)
    {
        Plan::where('id',$id)->delete();
        return redirect()->route('plan.index')->with('mensaje', "Plan eliminado correctamente");
    }
}
