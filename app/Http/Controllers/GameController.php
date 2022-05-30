<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = User::all();
        $game = Game::all();
        
        return response()->json([
            'status' =>200,
            'game'=> $game,
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

        
        $newGame = new Game();

        $newGame->user_id = $request->user_id;
        $newGame->die1 = $request->die1; 
        $newGame->die2 = $request->die2;
        
        if(($newGame->die1)+($newGame->die2) == 7) 
        {
            $newGame->result = 'win';
        }
        else
        {
            $newGame->result = 'lose';
        }

        $newGame->save();

        return response()->json([
            'status' =>200,
            'game'=> $newGame,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::where('id', $id)->
        first()->games()->get();
        
         
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
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::where('id', $id)->
        first()->games()->delete();
        
    }
}
