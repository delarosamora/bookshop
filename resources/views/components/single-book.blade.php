<div class="col-xl-4 col-lg-6 col-md-12">
    <div class="single-book card m-auto mb-5 regular-shadow" style="width: 18rem;">
        <div class="card-body">
            <img src="images\{{$book->image == "" ? "default.jpg" : $book->image}}" height="300px"/>
            <div class="book-info">
            <h5 class="card-title text-center">{{$book->title}}</h5>
            @if ($book->isReserved)
                <p class="bg-danger text-center text-white">RESERVADO</p>
            @else
                <form method="POST" action="{{route('reserves.store')}}" class="text-center">
                    @csrf
                    <input type="hidden" name="book_id" value="{{$book->id}}"/>
                    <button type="submit" class="btn btn-success" type="submit">Reservar</button>
                </form>
            @endif
            </div>
        </div>
    </div>
</div>
