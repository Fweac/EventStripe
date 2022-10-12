<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TicketController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)->paginate(5);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminIndex(Request $request)
    {
        if(!Gate::allows('update-ticket', auth()->user())) {
            abort(403, 'You are not authorized to view this page');
        }
        if($request->has('search')) {
            $tickets = Ticket::where('ticket_number', 'like', '%'.$request->search.'%')->paginate(5);
        } else {
            $tickets = Ticket::paginate(5);
        }
        return view('ticket.admin-index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTicketRequest $request)
    {
        $authedUser = auth()->user();
        $number = $request->validated()['quantity'];
        $amount = $number*1000;

        $authedUser->charge($amount, $request->payment_method, [
            'description' => 'Ticket purchase',
            'currency' => 'eur',
        ]);


        for($i = 0; $i < $number; $i++) {
            $ticket = str_pad(Ticket::all()->last()->id + 1, 4, '0', STR_PAD_LEFT);
            $random = rand(10000000, 99999999) . $ticket;
            if(Ticket::where('ticket_number', $random)->exists())
            {
                $i--;
                continue;
            }
            Ticket::create([
                'ticket_number' => $random,
                'user_id' => auth()->user()->id,
            ]);
        }
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //change validation to check if ticket is not used
        $ticket->update([
            'validated' => true,
        ]);
        return redirect()->route('ticket.admin-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
