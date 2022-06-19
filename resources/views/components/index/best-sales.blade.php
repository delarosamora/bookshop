<div class="best-sales mt-5 mb-5">
<h2 class="text-center">LIBROS MAS RESERVADOS</h2>
    <div class="row p-5">
        @foreach ($bestSales as $book)
            <x-single-book :book="$book" />
        @endforeach
    </div>
</div>
