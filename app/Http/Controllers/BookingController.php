<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Event;
use App\Models\Customer;
use App\Models\Booking;
use Illuminate\Support\Facades\Route;
use App\Models\Ticketing;
use DB;

class BookingController extends Controller
{
    public function index() {
        return view('booking.index');
    }

    public function validateCustomer(Request $request) {

        $request->validate([
            'nid' => 'required|exists:App\Models\Customer,nid|max:7|min:7',
        ]);

        $nid = $request->nid;
        
        $request->session()->put('nid', $nid);
        $customerId = DB::table('customers')->where('nid',$nid)->value('id');
        $request->session()->put('customerId',$customerId);
        
        $events = Event::all()->where('date','>=',today());
        return view('booking.eventchoose',compact('events'));

    }

    public function viewRooms(Request $request,$eventid) {
        $event = Event::find($eventid);
        $request->session()->put('eventId',$eventid);
        //dd($request->session());
        
        $rooms = Room::all()->where('status','Free');
        return view('booking.availrooms',compact('rooms'));
    }

    public function pay(Request $request, $roomid) {
        $room = Room::find($roomid);
        $request->session()->put('roomId',$roomid);

        $event = Event::find($request->session()->get('eventId'));
        //dd($request->session());
        
        $customer = Customer::find($request->session()->get('customerId'));

        return view('booking.pay',compact('room','event','customer'));

    }

    public function updateBookingRoom(Request $request) {
        
        $roomId = $request->session()->get('roomId');
        $room = Room::find($roomId);
        $customer = Customer::find($request->session()->get('customerId'));
        $event = Event::find($request->session()->get('eventId'));


        $request->validate([
            'roomId' => 'unique:bookings,room_id',
        ]);
        $booking=Booking::create([
            'book_date' => $request->date,
            'room_id' => $roomId,
            'price' => $room->price,
            'cus_id' => $customer->nid,
        ]);

        $booking->save();

        DB::table('rooms')->where('id',$roomId)->update(['status'=>'Booked']);

        $bookings = Booking::all()->where('cus_id',$customer->nid);
        return view('booking.mybookings',compact('bookings','customer','room','event'));
        alert()->success('Success','New booking made.');
        
    }

    public function viewMyBookings(Request $request) {

        if(null == ($request->session()->get('roomId')) || null == ($request->session()->get('customerId')) || null == ($request->session()->get('eventId'))) {
            alert()->error('Sorry','You do not have any bookings.');
            return redirect('/booking');
        }
        else{
            $room = Room::find($request->session()->get('roomId'));
            $customer = Customer::find($request->session()->get('customerId'));
            $event = Event::find($request->session()->get('eventId'));
            $bookings = Booking::all()->where('cus_id',$customer->nid);
            return view('booking.mybookings',compact('bookings','customer','room','event'));
        }
    }

    public function viewBookings() {
        return view('booking.viewbookings');
    }
    public function viewBookingCheck(Request $request) {
        $request->validate([
            'nid' => 'required|exists:App\Models\Customer,nid|max:7|min:7',
        ]);

        $bookings = Booking::all()->where('cus_id',$request->nid);
        $ticketings = Ticketing::all()->where('nid',$request->nid);
        return view('booking.viewbookings',compact('bookings','ticketings'));
    }

}