<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes=Quiz::all();
        return view('quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $quiz=new Quiz();
        $quiz->quiz=$request->quiz;
        $quiz->save();
        $quiz_id= $quiz->id;
        $ChoiceController = app()->make('App\Http\Controllers\ChoiceController');
        $ChoiceController->store($request, $quiz_id);
        return back()->with("message", "問題を保存しました。");

    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        return view('quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        $quiz->quiz=$request->note;
        $quiz->save();
        $quiz_id= $quiz->id;
        $ChoiceController = app()->make('App\Http\Controllers\ChoiceController');
        $ChoiceController->update($request, $quiz_id,$quiz);
        return back()->with("message", "問題を保存しました。");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
