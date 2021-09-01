<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::paginate(20);
        return view('room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotels=Hotel::all('id','name');
        $types=Room::select('type')->distinct()->pluck('type');
        return view('room.create',compact('hotels','types'));
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
            'hotel_id' => 'required',
            'roomno' => 'required',
            'type' => 'required',
            'price' => 'required',
        ]);

        if ($this->roomExists($request->hotel_id,$request->roomno)) {

            alert()->error('Error','Room already exists.');
            return redirect('/room');
        }
        else {

            $rooms=Room::create([
                'hotel_id' => $request->hotel_id,
                'roomno' => $request->roomno,
                'type' => $request->type,
                'price' => $request->price,
    
            ]);
    
            $rooms->save();
    
            alert()->success('Success','New room added.');
    
            return Redirect::route('room.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomStatus = Room::select('status')->distinct()->pluck('status');
        $hotels=Hotel::all('id','name');
        $types=Room::select('type')->pluck('type');
        return view('room.edit',compact('room','hotels','types','roomStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'hotel_id' => 'required',
            'roomno' => 'required', 
            'type' => 'required',
            'price' => 'required',
        ]);

        
            $room->update([
                'hotel_id' => $request->hotel_id,
                'roomno' => $request->roomno,
                'type' => $request->type,
                'price' => $request->price,
            ]);
    
            alert()->success('Success','Room details updated.');
    
            return Redirect::route('room.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        Room::destroy($room->id);

        alert()->success('Success','Room deleted successfully.');

        return Redirect::route('room.index');
    }

    private function roomExists($hotel_id, $roomno) {
        $roomExist = DB::table('rooms')->where('hotel_id',$hotel_id)->where('roomno',$roomno)->exists();
        return $roomExist;
    }

}
