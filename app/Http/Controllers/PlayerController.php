<?php
/*
namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $player = Player::all();
        //$user = User::all();
        return response()->json([
            'status' =>200,
            'player'=> $player,
            //'user'=> $user,
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
        
        $newPlayer = new Player();
        $newPlayer->user_id = $request->user_id; // $this user_id?
        $newPlayer->nickname = $request->nickname;
        $newPlayer->save();
        return response()->json([
            'status' =>200,
            'player'=> $newPlayer,  
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $user_id)
    {
        return Player::find($user_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {   
       
        
        $player = Player::find($user_id);
        $player->nickname = $request->nickname; 

        // "message": "SQLSTATE[42S22]: Column not found: 
        //1054 Unknown column 'players.id' in 'where clause' 
        //(SQL: select * from `players` where `players`.`id` = 1 limit 1)",
  
        
    }

   
}
*/