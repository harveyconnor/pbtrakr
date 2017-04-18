<?php

namespace App\Http\Controllers;

use App\Discipline;
use App\Event;
use App\Exercise;
use JavaScript;
use Auth;
use App\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::query()->where('user_id',Auth::user()->id)->get();
        foreach ($results as $result) {
            $result->exercise = $result->exercise;
        }

        JavaScript::put([
            'results' => $results->toJson()
        ]);

        return view('results.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $disciplines = Discipline::query()->get();
        $events = Event::query()->get();
        $exercises = Exercise::query()->get();
        foreach($exercises as $exercise){
            $exercise->type = $exercise->type;
        }

        JavaScript::put([
            'disciplines' => $disciplines->toJson(),
            'events' => $events->toJson(),
            'exercises' => $exercises->toJson(),
        ]);
        /*
         * Probably define an ajax request to filter out events & exercises.
         * */

        return view('results.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date = strtotime($request['date']);
        $date = date('Y-m-d',$date);

        $this->validate($request,[
            'result' => 'required',
            'notes' => 'max:2000',
            'date' => 'required',
            'exercise_id' => 'required'
        ]);

        Result::create([
            'result' => $request['result'],
            'notes' => $request['notes'],
            'date' => $date,
            'exercise_id' => $request['exercise_id'],
            'user_id' => Auth::user()->id
        ]);

        return 'Sucess!';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
