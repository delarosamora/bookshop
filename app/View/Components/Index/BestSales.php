<?php

namespace App\View\Components\Index;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\Collection;

class BestSales extends Component
{
    /**
     * Top 3 best sales.
     *
     */
    public $bestSales;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($bestSales)
    {
        $this->bestSales = $bestSales;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.index.best-sales')->with('books', $this->bestSales);
    }
}
