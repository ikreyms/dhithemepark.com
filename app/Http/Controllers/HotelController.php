<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels=Hotel::paginate(15);
        return view('hotel.index',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotel.create');
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
            'name' => 'required|unique:hotels,name',
        ]);

            $hotel=Hotel::create([

                'name'=>$request->name,
            ]);

            $hotel->save();

            alert()->success('Success','New hotel added successfully.');

            return Redirect::route('hotel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        return view('hotel.edit',compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //$this->validate($request,[
          //  'name' => 'required',
        //]);
            $request->validate([
                "name" => 'required|unique:hotels,name',
            ]);    

            $hotel->update([
                "name"=>$request->name,
            ]);
    
            alert()->success('Success','Hotel information updated.');
    
            return Redirect::route('hotel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        Hotel::destroy($hotel->id);

        alert()->success('Success','Hotel deleted successfully.');

        return Redirect::route('hotel.index');
    }

    private function hotelExists($name){
        $hotelExists=DB::table('hotels')->where('name',$name)->exists();
        return $hotelExists;
    }
}
