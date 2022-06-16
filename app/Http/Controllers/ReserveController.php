<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reserve;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reserves.index')->with('reserves', Reserve::all()->sortBy('returned'));
    }

    /**
     * Display a listing of the resource for the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexUser(Request $request)
    {
        return view('dashboard.myreserves.index')
            ->with('reserves', Auth::user()->reserves->sortBy('returned'));
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
        $book = Book::find($request->book_id);
        $this->authorize('reserve', $book);
        $reserve = new Reserve();
        $reserve->book()->associate($book);
        $reserve->user()->associate(Auth::user());
        $reserve->date = date("Y-m-d");
        $reserve->time = date("H:i");
        $reserve->save();
        return redirect()->route('dashboard')->with('success', 'Reserva realizada');
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
        //
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
        $reserve = Reserve::find($id);
        $reserve->returned = true;
        $reserve->save();
        return back()->with('success', 'Libro devuelto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
