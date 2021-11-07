<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view ('pages.districts.manage', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('pages.districts.create', compact('divisions'));
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
            'name'          => 'required|max:255',
            'division_id'   => 'required',
        ],
        [
            'name.required'         => 'Please Provide a Division Name',
            'division_id.required'  => 'Please Select The Division Name',
        ]);

        $district = new District();
        $district->name             = $request->name;
        $district->division_id      = $request->division_id;
        $district->save();

        return redirect()->route('district.manage');
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
        $district = District::find($id);
        $divisions = Division::orderBy('priority', 'asc')->get();
        if ( !is_null($district) ){
            return view('pages.districts.edit', compact('district', 'divisions'));
        }
        else{
            return redirect()->route('district.manage');
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
            'name'          => 'required|max:255',
            'division_id'   => 'required',
        ],
        [
            'name.required'         => 'Please Provide a Division Name',
            'division_id.required'  => 'Please Select The Division Name',
        ]);

        $district = District::find($id);
        $district->name             = $request->name;
        $district->division_id      = $request->division_id;
        $district->save();

        return redirect()->route('district.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        if(!is_null($district)){
            $district->delete();
        }
        return redirect()->route('district.manage');
    }
}
