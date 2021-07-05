<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReplyResource;
use App\Model\Like;
use App\Model\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function __construct()
    {
//        $this->middleware(['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions= Question::latest()->with('replies')->get();
        return response()->json($questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        Question::create($request->all());
        $request['slug']=Str::slug($request->title);
        $request['user_id']=2;
        $question=Question::create($request->all());
//        auth()->user()->question()->create($request->all());
        return response($question,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($question)
    {

        return Question::with('replies')->find($question);
//        return ReplyResource::collection(Question::with('replies')->find($question));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return response('updated',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
         $question->delete();
         return response('delete_record',401);
    }
}
