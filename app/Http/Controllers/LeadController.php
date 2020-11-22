<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

class LeadController extends Controller
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
        $lead = new Lead();
        //Declaramos el nombre con el nombre enviado en el request
        $lead->name = $request->name;
        // lo mismo para los demas campos de la tabla leads:
        $lead->email = $request->email;
        $lead->phone = $request->phone;
        $lead->message = $request->message;
        $lead->step_id = $request->step_id;
        //Guardamos el cambio en nuestro modelo
        $lead->save();
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
        //Solicitamos al modelo el Lead con el id solicitado por GET.
        return Lead::where('id', $id)->get();
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
        if(Lead::where('id', $id)->exists()) // si existe el Lead con el $id dado
        {
            $lead = Lead::find($id);
            $lead->name = $request->name; // entonces modificar datos
            $lead->email = $request->email;
            $lead->phone = $request->phone;
            $lead->message = $request->message;
            $lead->step_id = $request->step_id;
            $lead->save();
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
        if(Lead::where('id', $id)->exists()) // si existe el Lead con el $id dado
        {
            Lead::where('id', $id)->delete();
        }
    }
}
