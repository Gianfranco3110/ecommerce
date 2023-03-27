<?php

namespace App\Http\Controllers;

use App\Models\Dimensione;
use Illuminate\Http\Request;

/**
 * Class DimensioneController
 * @package App\Http\Controllers
 */
class DimensioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dimensiones = Dimensione::paginate();

        return view('dimensione.index', compact('dimensiones'))
            ->with('i', (request()->input('page', 1) - 1) * $dimensiones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dimensione = new Dimensione();
        return view('dimensione.create', compact('dimensione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Dimensione::$rules);

        $dimensione = Dimensione::create($request->all());

        return redirect()->route('atributos.index')
            ->with('success', 'Dimensiion creada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dimensione = Dimensione::find($id);

        return view('dimensione.show', compact('dimensione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dimensione = Dimensione::find($id);

        return view('dimensione.edit', compact('dimensione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dimensione $dimensione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dimensione $dimensione)
    {
        request()->validate(Dimensione::$rules);

        $dimensione->update($request->all());

        return redirect()->route('atributos.index')
            ->with('success', 'Dimension Actualizada con exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dimensione = Dimensione::find($id)->delete();

        return redirect()->route('dimensiones.index')
            ->with('success', 'Dimensione deleted successfully');
    }
}
