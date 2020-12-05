<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
* Class Lead
* @package App
*
* @OA\Tag(
*   name="Lead",
*   description="Lead Operations"
* )
*
* @OA\Schema(
*     title="Lead",
*     description="Lead model",
*     @OA\Xml(
*         name="Lead"
*     )
* )
*/

class Lead extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['name', 'email', 'phone', 'message', 'step_id'];

    /**
    *@OA\Property(
    *   property="name",
    *   title="Lead Name",
    *   description="Lead Name",
    *   type="string",
    *   example="Pedro"
    * )
    *            
    *@OA\Property(
    *   property="email",
    *   title="Lead email",
    *   description="Lead email",
    *   type="string",
    *   example="pedro@ejemplo1.com"
    * )
    *            
    *@OA\Property(
    *   property="phone",
    *   title=" Lead phone",
    *   description="Lead phone",
    *   type="string",
    *   example="1233567"
    * )
    * 
    *@OA\Property(
    *   property="message",
    *   title="Message for Lead",
    *   description="Message for Lead",
    *   type="string",
    *   example="Hello Pedro"
    *)
    * 
    *@OA\Property(
    *   property="step_id",
    *   title="Step ID for Lead",
    *   description="Step ID for Lead",
    *   type="int",
    *   example=3
    * )
    */
}
