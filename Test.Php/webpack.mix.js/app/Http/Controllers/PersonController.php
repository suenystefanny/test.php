<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;
use App\Http\Resources\PersonResource;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Person::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = Person::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'birth_place' => $request->birth_place,
            'hobby' => $request->hobby
        ]);

        return response()->json(new PersonResource($person));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Person::find($id);
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
        $person = Person::findOrFail($id);
        $person->name = $request->input('name');
        $person->last_name = $request->input('last_name');
        $person->birth_date = $request->input('birth_date');
        $person->birth_place = $request->input('birth_place');
        $person->hobby = $request->input('hobby');

        if (
            $person->save()
        ) {
            return new PersonResource($person);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::findOrFail($id);
        if ($person->delete()) {
            return new PersonResource($person);
        }
    }
}
