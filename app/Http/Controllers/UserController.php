<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       // foreach( User::all() as $user ) { }
        
            $totals =  User::groupBy('name')
        ->select('name')
        ->selectRaw('count(result) as total')
        ->join('games', 'users.id', '=', 'games.user_id')
        ->get();

            $wins =  User::groupBy('name')
        ->select('name')
        ->selectRaw('count(result) as wins')
        ->join('games', 'users.id', '=', 'games.user_id')
        ->where('result', '=', 'win')
        ->get();

       
       /*
        foreach($users as $user){
            
            foreach($totals as $total){

                foreach($wins as $win){
                    return $user;
                }
            }
        }
        */
        return response()->json([
            'status' =>200,    
            // 'users' => $user
            'totals' =>$totals, //[0]['total'],
            'wins' => $wins, // [0]['wins'],  
           
        ]);

      
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return User::find($id);
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
        $user = User::find($id);
        $user->name = $request->name; 

        $user->save();
        
        return response()->json([
            'status' =>200,
            'player'=> $user,  
        ]);
    }

    public function ranking()
    {   
        /*
        retorna el ranking mig de tots els jugadors del sistema. 
        És a dir, el percentatge mig d’èxits.
        */

        $total = Game::all()->count();
        $wins = Game::all()->where('result','=','win')->count();

        $success = round(($wins * 100) / $total);

        return response()->json([
            'status' =>200,
            'total games'=> $total,
            'total wins' => $wins,
            'success' => $success.'%',
        ]);
    }

    public function winner()
    {   
        /*
         retorna el jugador amb pitjor percentatge d’èxit.
        */
        
       
        
        $winner =  User::groupBy('name')
        ->select('name')
        ->selectRaw('count(result) as wins')
        ->join('games', 'users.id', '=', 'games.user_id')
        ->where('result', '=', 'win')
        
        ->orderBy('wins', 'DESC')
        ->first();
        
        //$rate = 

        return response()->json([
            'status' =>200, 
            'user'=>$winner,
           
        ]);
    }








    public function loser()
    {   
        /*
         retorna el jugador amb pitjor percentatge d’èxit.
        */
       
        
        $loser =  User::groupBy('name')
        ->select('name')
        ->selectRaw('count(result) as losses')
        ->join('games', 'users.id', '=', 'games.user_id')
        ->where('result', '=', 'lose')
        ->orderBy('losses')
        ->first();
        
        



        return response()->json([
            'status' =>200,
            
            //'game'=> $game,
            'user'=>$loser,
            
        ]);
    }
}
