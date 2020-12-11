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
     *         description="Successful operation."
     *   ),
     *   @OA\Response(
     *         response=404,
     *         description="Not found."
     *   ),
     *   @OA\Response(
     *         response=500,
     *         description="CRM failure."
     *   )
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
     *       description="Lead information",
     *       @OA\JsonContent(ref="#/components/schemas/Lead")
     *   ),
     *   @OA\Response(
     *         response=201,
     *         description="Successful operation, new Lead has been created",
     *         @OA\JsonContent(
     *                  ref="#/components/schemas/Lead"
     *         )
     *   ),
     *   @OA\Response(
     *         response=404,
     *         description="Not found."
     *   ),
     *   @OA\Response(
     *         response=500,
     *         description="CRM failure."
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
        // creamos la reglas de validacion
        $rules = [
            'name' => ['required' , 'string', 'min:3', 'max:30'],
            'email' =>  ['required', 'string', 'email'],
            'phone' => ['required', 'string', 'min:5', 'max:10'],
            'message' => ['required', 'string', 'min:5', 'max:255'],
            'step_id' => ['required', 'integer', 'min:1']
        ];

        // ejecutamos el validador, en caso de que falle devolvemos la respuesta
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return [
                'created' => false,
                'errors'  => $validator->errors()->all()
            ];
        }

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

        return $lead;
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
     *         description="Successful operation.",
     *         @OA\JsonContent(
     *                  ref="#/components/schemas/Lead"
     *         )
     *   ),
     *   @OA\Response(
     *         response=404,
     *         description="Not found."
     *   ),
     *   @OA\Response(
     *         response=500,
     *         description="CRM failure."
     *   )
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
        if(!Lead::where('id', $id)->exists()) // si NO existe el Lead con el $id dado
        {
            return response()->json(['error' => 'Given Lead ID Not Found!'], 404);
        }
        else
        {
            return Lead::where('id', $id)->get();
        }
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
     *       description="Lead update information",
     *       @OA\JsonContent(ref="#/components/schemas/Lead")
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
     *         description="Successful operation.",
     *         @OA\JsonContent(
     *                   ref="#/components/schemas/Lead"
     *         )
     *   ),
     *   @OA\Response(
     *         response=404,
     *         description="Not found."
     *   ),
     *   @OA\Response(
     *         response=500,
     *         description="CRM failure."
     *   )
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
        // creamos la reglas de validacion
        $rules = [
            'name' => ['required' , 'string', 'min:3', 'max:30'],
            'email' =>  ['required', 'string', 'email'],
            'phone' => ['required', 'string', 'min:5', 'max:10'],
            'message' => ['required', 'string', 'min:5', 'max:255'],
            'step_id' => ['required', 'integer', 'min:1']
        ];

        // ejecutamos el validador, en caso de que falle devolvemos la respuesta
        $validator = \Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return [
                'updated' => false,
                'errors'  => $validator->errors()->all()
            ];
        }

        if(Lead::where('id', $id)->exists()) // si existe el Lead con el $id dado
        {
            $lead = Lead::find($id);
            $lead->name = $request->name; // entonces modificar datos
            $lead->email = $request->email;
            $lead->phone = $request->phone;
            $lead->message = $request->message;
            $lead->step_id = $request->step_id;
            $lead->save();

            return Lead::where('id', $id)->get();
        }
        else
        {
            return response()->json(['error' => 'Given Lead ID Not Found!'], 404);
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
     *         description="Successful operation."
     *   ),
     *   @OA\Response(
     *         response=404,
     *         description="Not found."
     *   ),
     *   @OA\Response(
     *         response=500,
     *         description="CRM failure."
     *   )
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
            return response()->json(['success' => 'Lead successfully deleted!'], 200);
        }
        else
        {
            return response()->json(['error' => 'Given Lead ID Not Found!'], 404);
        }
    }
}