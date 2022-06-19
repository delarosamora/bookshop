<?php

namespace App\Http\Controllers;

use App\Models\Book;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestSales = Book::all()->sortByDesc('reservesnumber')->take(3);
        return view('index')->with('bestSales', $bestSales);
    }
}
