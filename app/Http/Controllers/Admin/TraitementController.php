<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Commande;
use App\User;
use App\Produit;
use App\Lignecommande; 
use App\Commande_produit; 

use Carbon;

class TraitementController extends Controller
{

 public function traitement_commande($id,$etape,Request $request)
    {
     /*try {*/
          $mytime = Carbon\Carbon::now();
          $todayDate= $mytime->toDateTimeString();
          $commande=Commande::find($id);

            switch ($etape) {

                case 'En whatsapp':
                    $commande->status='En whatsapp';
                    break;

                 case 'En appel':
                    $commande->status='En appel';
                    break;
                   case 'En Vente':
                    $commande->status='En Vente';
                    break;
                     case 'En Livraison':
                    $commande->status='En Livraison';
                    break;
                     case 'Réaliser':
                    $commande->status='Réaliser';
                    break;
                     case 'Annuler':
                    $commande->status='Annuler';
                    break;
            }
        
    
           $commande->save();

          return redirect()->back();

       /* }catch(\Exception $e){
      		return redirect()->back()->with('error', 'il y a des problèmes dans les données du flux svp vp il faut les vérifier avant de passer à l\'étape suivante !');
  		}*/
    }

}
