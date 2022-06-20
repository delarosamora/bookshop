<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookAdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.books.index')->with('books', Book::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.createbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:books',
            'description' => 'required',
        ]);

        $book = new Book(
            [
                'title' => $request->title,
                'description' => $request->description,
            ]
        );
        if ($request->hasFile('imagebook')){
            $request->file('imagebook')->storeAs('images', $request->file('imagebook')->hashName());
            $book->image = $request->file('imagebook')->hashName();
        }
        $book->save();
        return redirect()->route('adminbooks.index')->with('success', 'Libro creado con exito');
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

        return view('dashboard.books.editbook')->with('book', Book::find($id));
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
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $book = Book::find($id);
        $book->title = $request->title;
        $book->description = $request->description;
        if ($request->hasFile('imagebook')){
            $request->file('imagebook')->storeAs('images', $request->file('imagebook')->hashName());
            $book->image = $request->file('imagebook')->hashName();
        }
        $book->save();
        return redirect()->route('adminbooks.index')->with('success', 'Libro editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Book::destroy($id);
        return redirect()->route('adminbooks.index')->with('success', 'Libro eliminado con exito');
    }
}
