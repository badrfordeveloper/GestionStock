<?php
namespace App\Helpers;

use Illuminate\Http\Request;
use Auth;
use App\Acce;
 
class Checker {
 

    /*public static function checkAcces($table ,$action )
    {

        $acce = Acce::where("table",$table)->where("action",$action)->get()->first();
        $check = 0;
        foreach (Auth::user()->role->accesroles as $ar) {
            if ($ar->id == $acce->id) {
                $check++;
            }
        }

        if ($check == 0) {
           // return redirect()->back();
            return false ;
        }
        else{
            return true ;
        }

        
    }*/

    public static function checkAcces($table ,$action )
    {

       if ($action == "create" || $action == "store") {
           $action = "ajouter";
       }
       else if ($action == "edit" || $action == "update") {
           $action = "modifier";
       }
       else if ($action == "destroy" ) {
           $action = "supprimer";
       }
       else if ($action == "show" )
       {
            $action = "afficher";
       }
       else if ($action == "index" )
       {
            $action = "liste";        
       }
       else if ($action == "validation" )
       {
            $action = "validation";        
       }

        $acce = Acce::where("table",$table)->where("action",$action)->get()->first();
        //dd($acce);
        $check = 0;
        //dd($acce);
        if (@count(Auth::user()->role->acces) > 0 && @count($acce)>0) 
        {
         
          foreach (Auth::user()->role->acces as $ar) {

              if ($ar->id == $acce->id) {


                
                  $check++;
              }
          }
        }

         if ($check == 0) {
           // return redirect()->back();
            return false ;
        }
        else{
            return true ;
        }
    }

}
