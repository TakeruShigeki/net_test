<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$quiz_id)
    {
        
        $choicesID=array(
            '1'=>'choice1',
            '2'=>'choice2',
            '3'=>'choice3',
            '4'=>'choice4',
        );
        foreach($choicesID as $key=>$choices)
            {
                $choice=new choice();
                $choice->answer=$request->$choices;
                if ($request->$key="on"){
                    $choice->anser_flag=1;
                }else {
                    $choice->anser_flag=0;
                }
                $choice->quiz_id=$quiz_id;
                $choice->importance=$request->importance;
                $choice->save();
            }
        }
    /**
     * Display the specified resource.
     */
    public function show(Choice $choice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Choice $choice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$quiz_id,$quiz)
    {

        
        $choicesId=1;
        $checkId=6;
        foreach($quiz->choices as $choice){
            $choice->answer = $request->$choicesId;
            if($request->$checkId=="on"){
                $choice->anser_flag=1;
            }else{
                $choice->anser_flag=0;
            }
            $choice->quiz_id = $quiz_id;
            $choice->save();
            $choicesId+=1;
            $checkId+=1;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choice $choice)
    {
        //
    }
}
