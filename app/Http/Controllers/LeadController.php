<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;

/**
* @OA\Info(title="Voyager CRM", version="1.0")
*
* @OA\Server(url="http://voyager.crm.localhost")
*/

class LeadController extends Controller
{
    /**
     * @OA\Get(path="/api/leads/",
     *   tags={"Lead"},
     *   summary="Show Leads",
     *   description="Returns list of all Leads",
     *   @OA\Response(
     *         response=200,
     *         description="Mostrar Leads"
     *     )
     * )
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Lead::all(); // returns list of Leads
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
     * @OA\Post(path="/api/leads",
     *   tags={"Lead"},
     *   summary="Store",
     *   description="Store Lead",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Lead Store body",
     *       @OA\JsonContent(
     *            @OA\Property(
     *              property="name",
     *              title="Lead Name",
     *              description="Lead Name",
     *              type="string",
     *              example="Pedro"
     *            ),
     *            @OA\Property(
     *              property="email",
     *              title="Lead email",
     *              description="Lead email",
     *              type="string",
     *              example="pedro@ejemplo1.com"
     *            ),
     *            @OA\Property(
     *              property="phone",
     *              title=" Lead phone",
     *              description="Lead phone",
     *              type="string",
     *              example="1233567"
     *            ),
     *            @OA\Property(
     *              property="message",
     *              title="Message for Lead",
     *              description="Message for Lead",
     *              type="string",
     *              example="Hello Pedro"
     *            ),
     *            @OA\Property(
     *              property="step_id",
     *              title="Step ID for Lead",
     *              description="Step ID for Lead",
     *              type="int",
     *              example=3
     *            )  
     *       )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se guarda Lead en base de datos"
     *   )
     * )
     */
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
     * @OA\Get(path="/api/leads/{id}",
     *   tags={"Lead"},
     *   summary="Show",
     *   description="Returns Lead by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing Lead ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=12
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Mostrar Lead"
     *     )
     * )
     */
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
     * @OA\Put(path="/api/leads/{id}",
     *   tags={"Lead"},
     *   summary="Update",
     *   description="Update Lead",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Lead Store",
     *       @OA\JsonContent(
     *            @OA\Property(
     *              property="name",
     *              title="Lead Name",
     *              description="Lead Name",
     *              type="string",
     *              example="Pedro"
     *            ),
     *            @OA\Property(
     *              property="email",
     *              title="Lead email",
     *              description="Lead email",
     *              type="string",
     *              example="pedro_rmg@ejemplo1.com"
     *            ),
     *            @OA\Property(
     *              property="phone",
     *              title=" Lead phone",
     *              description="Lead phone",
     *              type="string",
     *              example="1233567"
     *            ),
     *            @OA\Property(
     *              property="message",
     *              title="Message for Lead",
     *              description="Message for Lead",
     *              type="string",
     *              example="Hello Pedro"
     *            ),
     *            @OA\Property(
     *              property="step_id",
     *              title="Step ID for Lead",
     *              description="Step ID for Lead",
     *              type="int",
     *              example=1
     *            )  
     *       )
     *   ),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing Lead ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=12
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se actualiza Lead en base de datos"
     *     )
     * )
     */
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
     * @OA\Delete(path="/api/leads/{id}",
     *   tags={"Lead"},
     *   summary="Delete",
     *   description="Delete Lead",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing Lead ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=12
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se borra Lead en base de datos"
     *     )
     * )
     */
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