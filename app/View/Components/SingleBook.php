<?php

namespace App\View\Components;

use App\Models\Book;
use Illuminate\View\Component;

class SingleBook extends Component
{

    /**
     * The book.
     *
     */
    public $book;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.single-book')->with('book', $this->book);
    }
}
