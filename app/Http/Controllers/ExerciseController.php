<?php

namespace App\Http\Controllers;

use Auth;
use App\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'type_id' => 'required',
            'event_id' => 'required'

        ]);

        $exercise = Exercise::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'type_id' => $request['type_id'],
            'event_id' => $request['event_id'],
            'user_id' => Auth::user()->id
        ]);

        return json_encode($exercise);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        if($request->has('e')){
            $exercises = Exercise::query()->where('event_id', $request->input('e'))->get();
            return json_encode($exercises);
        }

        if($request->has('q')) {
            $exercises = Exercise::query()->where('name', 'like', '%' . $request['q'] . '%')->get();
            return json_encode($exercises);
        }

        $error = 'Expected a query, please provide one.';
        return json_encode($error);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exercise  $exercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
