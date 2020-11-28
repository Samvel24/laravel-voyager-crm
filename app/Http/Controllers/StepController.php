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
     * @OA\Post(path="/api/steps",
     *   tags={"Step"},
     *   summary="Store",
     *   description="Store Step",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Store Step body",
     *       @OA\JsonContent(
     *            @OA\Property(
     *              property="key",
     *              title="Step Key",
     *              description="Step Key",
     *              type="string",
     *              example="abierto"
     *            ),
     *            @OA\Property(
     *              property="value",
     *              title="Step Value",
     *              description="Step Value",
     *              type="string",
     *              example="Abierto"
     *            ), 
     *       )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se guarda Step en base de datos"
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
        $step = new Step();
        //Declaramos el nombre con el nombre enviado en el request
        $step->key = $request->key;
        //Declaramos el value con el value enviado en el request
        $step->value = $request->value;
        //Guardamos el cambio en nuestro modelo
        $step->save();
    }

    /**
     * @OA\Get(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Show",
     *   description="Returns Step by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="query",
     *     description="Put existing step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="int",
     *         example=7
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Mostrar Step"
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
     * @OA\Put(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Update",
     *   description="Update Step",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Store Step body",
     *      @OA\JsonContent(
     *          @OA\Property(
     *              property="key",
     *              title="Step Key",
     *              description="Step Key",
     *              type="string",
     *              example="abierto_"
     *          ),
     *          @OA\Property(
     *              property="value",
     *              title="Step Value",
     *              description="Step Value",
     *              type="string",
     *              example="Abierto_"
     *          ) 
     *      )
     *   ),
     *   @OA\Parameter(
     *     name="id",
     *     in="query",
     *     description="Put existing Step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="int",
     *         example=7
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se actualiza Step en base de datos"
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
        if(Step::where('id', $id)->exists()) // si existe el Step con el $id dado
        {
            $step = Step::find($id);
            $step->key = $request->key; // entonces modificar datos
            $step->value = $request->value;
            $step->save();
        }
    }

    /**
     * @OA\Delete(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Delete",
     *   description="Delete Step",
     *   @OA\Parameter(
     *     name="id",
     *     in="query",
     *     description="Put existing Step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="int",
     *         example=7
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Se borra Step en base de datos"
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
        if(Step::where('id', $id)->exists()) // si existe el Lead con el $id dado
        {
            Step::where('id', $id)->delete();
        }
    }
}
