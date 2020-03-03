<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 03/03/2020
 * Time: 10:13
 */

namespace App\Http\Controllers;



class DefaultController extends Controller
{


   public function index(){
       return response()->json([
           "Author:"=>"Kwafo Nana Mensah",
           "Developer:"=>"Kwafo Nana Mensah",
           "Project Title:"=>" Authentication as a Microservice",
           "Info"=>"visit the Api to test Endpoint.Use PostMan to test endpoint"
       ]);
   }
}