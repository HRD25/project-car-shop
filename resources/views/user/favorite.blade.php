@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <h1 class="text-center">Favorits List</h1>
                <hr class="mt-2 mb-1 border border-dark">
                <div class="row">
                    @if (count($favorites) < 1)
                        <h1 class="text-center">No, favorite offerts! :(</h1>
                    @endif
                    @foreach ($favorites as $favorite)
                        <div class="col-sm-3 p-1">
                            <div class="card">
                                <div class="card-body p-0 border border-dark rounded-3">
                                    <img class="img-fluid" src="{{ $favorite->offers->photo }}"
                                        style="height: 100px,width:100%;">
                                    <h5 class="card-text text-center"><b>{{ $favorite->offers->carname }}</b></h5>
                                    <p class="card-text h5 text-end">
                                        Price: <b>{{ $favorite->offers->price }}</b> $
                                    </p>
                                    <div class="row mb-1">
                                        <div class="col-sm-7">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Course:</b> {{ $favorite->offers->course }} <b>km</b>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Yearproduction:</b> {{ $favorite->offers->yearproduction }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="p-0 m-0">
                                                <ul class="list-group">
                                                    <li class="list-group-item p-0">
                                                        <b>Vehiclestatus:</b> {{ $favorite->offers->vehiclestatus }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-text text-start">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                        </svg>
                                        {{ $favorite->offers->location }}
                                    </p>
                                    <div class="row">
                                        <div class="col-sm-8 text-center  p-0">
                                            <a href="{{ route('ShowOffer', ['id' => $favorite->id_offer]) }}">
                                                <button type="button" class="btn btn-sm btn-dark col-sm-8">Check</button>
                                            </a>
                                        </div>

                                        <div class="col-sm-4 text-end p-0">
                                            <form
                                                action="{{ route('user.deletefavorite', ['id' => $favorite->id_offer]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-white border-0" role="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                        fill="red" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
@endsection
