<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ScoreboardController extends Controller
{

    public function update_sse(){
        
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->setCallback(
            function() {
                    $score = DB::table('scoreboard')->where('id', '1')->get();
                    echo "data: ".json_encode($score)."\n\n";
                    echo "retry: 100\n\n"; // no retry would default to 3 seconds.
                    ob_end_flush();
                    // ob_flush();
                    flush();
            });
        $response->send();
    }
   

    public function control_papan(){
        return view('scoreboard/control_papan');
    }

    public function tampilan_papan(){
        return view('scoreboard/tampilan_papan');
    }

    public function store_home(Request $request){
        DB::table('scoreboard')->where('id','1')->update([
            'name_home' => $request->input('name_home') 
       ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function store_away(Request $request){
        DB::table('scoreboard')->where('id','1')->update([
            'name_away' => $request->input('name_away') 
       ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function scorehomeplus2(Request $request){
        // $score = DB::table('scoreboard')->select('score_home')->where('id', '1')->first();
        $score = DB::table('scoreboard')->where('id', '1')->get();
        foreach($score as $sc){
            $result = $sc->score_home;
        }
            $result_fix = $result+2;
        DB::table('scoreboard')->where('id','1')->update([
            'score_home' =>  $result_fix
        ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function scorehomeminus2(Request $request){
         // $score = DB::table('scoreboard')->select('score_home')->where('id', '1')->first();
         $score = DB::table('scoreboard')->where('id', '1')->get();
         foreach($score as $sc){
             $result = $sc->score_home;
         }
             $result_fix = $result-2;
             if($result_fix<0){
                $result_fix=0;
             }
         DB::table('scoreboard')->where('id','1')->update([
             'score_home' =>  $result_fix
         ]);
 
        return response()->json(
         [
           'success' => true,
           'message' => 'Data inserted successfully'
         ]);

    }

    public function scorehomeplus3(Request $request){
        // $score = DB::table('scoreboard')->select('score_home')->where('id', '1')->first();
        $score = DB::table('scoreboard')->where('id', '1')->get();
        foreach($score as $sc){
            $result = $sc->score_home;
        }
            $result_fix = $result+3;
            if($result_fix<0){
               $result_fix=0;
            }
        DB::table('scoreboard')->where('id','1')->update([
            'score_home' =>  $result_fix
        ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);

   }

   public function scorehomeminus3(Request $request){
    // $score = DB::table('scoreboard')->select('score_home')->where('id', '1')->first();
    $score = DB::table('scoreboard')->where('id', '1')->get();
    foreach($score as $sc){
        $result = $sc->score_home;
    }
        $result_fix = $result-3;
        if($result_fix<0){
           $result_fix=0;
        }
    DB::table('scoreboard')->where('id','1')->update([
        'score_home' =>  $result_fix
    ]);

   return response()->json(
    [
      'success' => true,
      'message' => 'Data inserted successfully'
    ]);

    }

    //skor-away

    public function scoreawayplus2(Request $request){
        // $score = DB::table('scoreboard')->select('score_away')->where('id', '1')->first();
        $score = DB::table('scoreboard')->where('id', '1')->get();
        foreach($score as $sc){
            $result = $sc->score_away;
        }
            $result_fix = $result+2;
        DB::table('scoreboard')->where('id','1')->update([
            'score_away' =>  $result_fix
        ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function scoreawayminus2(Request $request){
         // $score = DB::table('scoreboard')->select('score_away')->where('id', '1')->first();
         $score = DB::table('scoreboard')->where('id', '1')->get();
         foreach($score as $sc){
             $result = $sc->score_away;
         }
             $result_fix = $result-2;
             if($result_fix<0){
                $result_fix=0;
             }
         DB::table('scoreboard')->where('id','1')->update([
             'score_away' =>  $result_fix
         ]);
 
        return response()->json(
         [
           'success' => true,
           'message' => 'Data inserted successfully'
         ]);

    }

    public function scoreawayplus3(Request $request){
        // $score = DB::table('scoreboard')->select('score_away')->where('id', '1')->first();
        $score = DB::table('scoreboard')->where('id', '1')->get();
        foreach($score as $sc){
            $result = $sc->score_away;
        }
            $result_fix = $result+3;
            if($result_fix<0){
               $result_fix=0;
            }
        DB::table('scoreboard')->where('id','1')->update([
            'score_away' =>  $result_fix
        ]);

       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);

   }

   public function scoreawayminus3(Request $request){
    // $score = DB::table('scoreboard')->select('score_away')->where('id', '1')->first();
    $score = DB::table('scoreboard')->where('id', '1')->get();
    foreach($score as $sc){
        $result = $sc->score_away;
    }
        $result_fix = $result-3;
        if($result_fix<0){
           $result_fix=0;
        }
    DB::table('scoreboard')->where('id','1')->update([
        'score_away' =>  $result_fix
    ]);

   return response()->json(
    [
      'success' => true,
      'message' => 'Data inserted successfully'
    ]);

    }

    public function store_sound1(Request $request){

        DB::table('scoreboard')->where('id','1')->update([
            'musik' =>  1
        ]);
    
       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    
    }

    
    public function store_sound2(Request $request){

        DB::table('scoreboard')->where('id','1')->update([
            'musik' =>  2
        ]);
    
       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function store_sound3(Request $request){

        DB::table('scoreboard')->where('id','1')->update([
            'musik' =>  3
        ]);
    
       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }

    public function update_sound(Request $request){

        DB::table('scoreboard')->where('id','1')->update([
            'musik' =>  0
        ]);
    
       return response()->json(
        [
          'success' => true,
          'message' => 'Data inserted successfully'
        ]);
    }
  

    public function get_score(){
        $score = DB::table('scoreboard')->where('id', '1')->get();
        return json_encode($score);
    }


    // public function test_post(){
    //     $score = DB::table('scoreboard')->where('id', '1')->get();
    //     foreach($score as $sc){
    //         $result = $sc->score_home;
    //     }
    //     echo $result+2;
        
    // }
}
