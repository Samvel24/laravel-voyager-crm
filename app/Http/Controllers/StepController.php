<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepController extends Controller
{
    /**
     * @OA\Get(path="/api/steps/",
     *   tags={"Step"},
     *   summary="Show Steps",
     *   description="Returns list of all Steps",
     *   @OA\Response(
     *         response=200,
     *         description="Mostrar Steps"
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
        return Step::all(); // returns list of Steps
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
     *       description="Step information",
     *       @OA\JsonContent(ref="#/components/schemas/Step")
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Successful operation.",
     *         @OA\JsonContent(
     *                  ref="#/components/schemas/Step"
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
            'key' => ['required' , 'string', 'min:7', 'max:20'],
            'value' =>  ['required', 'string', 'min:7', 'max:20']
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

        //Instanciamos la clase Step
        $step = new Step();
        //Declaramos el nombre con el nombre enviado en el request
        $step->key = $request->key;
        //Declaramos el value con el value enviado en el request
        $step->value = $request->value;
        //Guardamos el cambio en nuestro modelo
        $step->save();

        return Step::where('id', $id)->get();
    }

    /**
     * @OA\Get(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Show",
     *   description="Returns Step by ID",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=7
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Successful operation.",
     *         @OA\JsonContent(
     *                  ref="#/components/schemas/Step"
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
        //Solicitamos al modelo el Step con el id solicitado por GET.
        if(!Step::where('id', $id)->exists()) // si NO existe el Step con el $id dado
        {
            return response()->json(['error' => 'Given Step ID Not Found!'], 404);
        }
        else
        {
            return Step::where('id', $id)->get();
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
     * @OA\Put(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Update",
     *   description="Update Step",
     *   @OA\RequestBody(
     *       required=true,
     *       description="Store Step body",
     *      @OA\JsonContent(ref="#/components/schemas/Step")
     *   ),
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing Step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=7
     *     )
     *   ),
     *   @OA\Response(
     *         response=200,
     *         description="Successful operation.",
     *         @OA\JsonContent(
     *                   ref="#/components/schemas/Step"
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
            'key' => ['required' , 'string', 'min:7', 'max:20'],
            'value' =>  ['required', 'string', 'min:7', 'max:20']
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

        if(Step::where('id', $id)->exists()) // si existe el Step con el $id dado
        {
            $step = Step::find($id);
            $step->key = $request->key; // entonces modificar datos
            $step->value = $request->value;
            $step->save();

            return Step::where('id', $id)->get();
        }
        else
        {
            return response()->json(['error' => 'Given Step ID Not Found!'], 404);
        }
    }

    /**
     * @OA\Delete(path="/api/steps/{id}",
     *   tags={"Step"},
     *   summary="Delete",
     *   description="Delete Step",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Put existing Step ID",
     *     required=true,
     *     @OA\Schema(
     *         type="integer",
     *         example=7
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
        if(Step::where('id', $id)->exists()) // si existe el Step con el $id dado
        {
            Step::where('id', $id)->delete();
            return response()->json(['success' => 'Step successfully deleted!'], 200);
        }
        else
        {
            return response()->json(['error' => 'Given Step ID Not Found!'], 404);
        }
    }
}
