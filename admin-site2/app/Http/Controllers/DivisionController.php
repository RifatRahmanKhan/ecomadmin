<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Division;
use App\Models\District;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view ('pages.divisions.manage', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:divisions',
        ],
        [
            'name.required' => 'Please Provide a Division Name',
        ]);
        
        $priority   =   0;
        if(!is_null($request->priority)){
            $request->validate([
                'priority' => 'numeric|min:0'
            ]);
            
            $priority   =   $request->priority;
        }

        $division = new Division();
        $division->name         = $request->name;
        $division->priority     = $priority;
        $division->save();

        return redirect()->route('division.manage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Division::find($id);

        if ( !is_null($division) ){
            return view('pages.divisions.edit', compact('division'));
        }
        else{
            return redirect()->route('division.manage');
        }
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
        $request->validate([
            'name' => 'required|max:255'
        ],
        [
            'name.required' => 'Please Provide a Division Name',
        ]);


        $priority   =   0;
        if(!is_null($request->priority)){
            $request->validate([
                'priority' => 'numeric|min:0'
            ]);
            
            $priority   =   $request->priority;
        }


        $division = Division::find($id);
        $division->name         = $request->name;
        $division->priority     = $request->priority;
        $division->save();

        return redirect()->route('division.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);

        if ( !is_null($division) ){
            $districts = District::where('division_id', $division->id)->get();

            foreach( $districts as $district ){
                $district->delete();
            }
            $division->delete();
        }

        return redirect()->route('division.manage');
    }
}
