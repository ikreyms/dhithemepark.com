<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Activity;
use App\Models\Ticketing;
use App\Models\Customer;
use DB;

class TicketController extends Controller
{
    public function chooseEvent() {
        $events = Event::all()->where('date','>=',today());
        return view('ticketing.eventchoose',compact('events'));
    }
    public function getTicket($id, Request $request) {
        $event = Event::find($id);
        $activities = Activity::all();
        //dd($activities);
        $nid = $request->session()->get('nid');
        return view('ticketing.getticket',compact('event','activities','nid'));
    }

    public function enterTicket(Request $request) {

        $request->validate([
            'nid' => 'required',
            'act_id' => 'required',
            'no_of_tick' => 'required',
            'price_per_ticket' => 'required',
            'total_price' => 'required',
        ]);
        $ticketing = Ticketing::create([
            'tick_date' => $request->date,
            'activity_id' => $request->act_id,
            'no_of_ticks' => $request->no_of_tick,
            'nid' => $request->nid,
        ]);

        $ticketing->save();

        return redirect('/mytickets');
        alert()->success('Success','Ticket purchased.');
    }

    public function viewMyTickets(Request $request) {
        if(null == ($request->session()->get('nid')) || null == ($request->session()->get('customerId'))) {
            alert()->error('Sorry.','You do not have any tickets purchased.');
            return redirect('/ticketing');
        }
        else{
            $ticketings = Ticketing::all()->where('nid',$request->session()->get('nid'));
            $customer = Customer::find($request->session()->get('customerId'));
            
            //dd(compact('ticketings'));
            return view('ticketing.mytickets',compact('ticketings','customer'));    
        }
    }
}
