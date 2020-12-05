<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Class Step
* @package App
*
* @OA\Tag(
*   name="Step",
*   description="Step Operations"
* )
*
* @OA\Schema(
*     title="Step",
*     description="Step model",
*     @OA\Xml(
*         name="Step"
*     )
* )
*/

class Step extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['key', 'value'];

    /**
    *@OA\Property(
    *   property="key",
    *   title="Step Key",
    *   description="Step Key",
    *   type="string",
    *   example="abierto"
    * ),
    *@OA\Property(
    *   property="value",
    *   title="Step Value",
    *   description="Step Value",
    *   type="string",
    *   example="Abierto"
    *)
    */    
}
