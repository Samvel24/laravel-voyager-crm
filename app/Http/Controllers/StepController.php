<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Instanciamos la clase Lead
        $step = new Step();
        //Declaramos el nombre con el nombre enviado en el request
        $step->key = $request->key;
        //Declaramos el value con el value enviado en el request
        $step->value = $request->value;
        //Guardamos el cambio en nuestro modelo
        $step->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //Solicitamos al modelo el Step con el id solicitado por GET.
        return Step::where('id', $id)->get();
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
        if(Step::where('id', $id)->exists()) // si existe el Step con el $id dado
        {
            $step = Step::find($id);
            $step->key = $request->key; // entonces modificar datos
            $step->value = $request->value;
            $step->save();
        }
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
        if(Step::where('id', $id)->exists()) // si existe el Lead con el $id dado
        {
            Step::where('id', $id)->delete();
        }
    }
}
