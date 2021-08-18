@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($offers as $offer)
                <div class="col-sm-3"></div>
                <div class="col-sm-6 ">
                    <div class="card border border-dark">
                        <div class="card-body p-0">
                            <div class="container-fluid text-center p-0">
                                <img src="{{ $offer->photo }}" class="img-fluid" style="width: 100%">
                            </div>
                            <div class="text mt-3">
                                <h2 class="text-center"><b>{{ $offer->carname }}</b></h2>
                                <h3 class="text-end mb-0">Price: <b>{{ $offer->price }}</b> zł</h3>
                                <hr class="mt-0 mb-2">
                                <div>
                                    <div class="d-flex flex-row">
                                        <div class="p-1">
                                            <ul class="list-group">
                                                <li class="list-group-item p-0">
                                                    <b>Fueltype:</b> {{ $offer->fueltype }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-1">
                                            <ul class="list-group">
                                                <li class="list-group-item p-0">
                                                    <b>Course:</b> {{ $offer->course }} km
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-1">
                                            <ul class="list-group">
                                                <li class="list-group-item p-0">
                                                    <b>Yearproduction:</b> {{ $offer->yearproduction }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-1">
                                            <ul class="list-group">
                                                <li class="list-group-item p-0">
                                                    <b>Vehiclestatus:</b> {{ $offer->vehiclestatus }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row">
                                        <div class="p-1">
                                            <ul class="list-group">
                                                <li class="list-group-item p-0">
                                                    <b>Steeringwheel:</b> {{ $offer->steeringwheel }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                Created: <b>{{ $offer->created_at }}</b>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('home') }}">
                                    <button type="button" class="btn btn-sm btn-dark col-sm-5">Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3 border border-dark">
                        <div class="card-body">
                            <h3 class="text-center"><b>Description</b></h3>
                            <hr class="mt-1">
                            <h5 class="card-text">{{ $offer->description }}</h5>
                            <h3 class="text-center mt-4"><b>Information to Car</b></h3>
                            <hr class="mt-1">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Carname</th>
                                            <th scope="col">Model</th>
                                            <th scope="col">BodyType</th>
                                            <th scope="col">Fueltype</th>
                                            <th scope="col">Course</th>
                                            <th scope="col">Yearproduction</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{{ $offer->carname }}</td>
                                        <td>{{ $offer->id_carmodel }}</td>
                                        <td>{{ $offer->bodytypes->name }}</td>
                                        <td>{{ $offer->fueltype }}</td>
                                        <td>{{ $offer->course }}</td>
                                        <td>{{ $offer->yearproduction }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col">Vehiclestatus</th>
                                            <th scope="col">Engine</th>
                                            <th scope="col">Drive</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Steeringwheel</th>
                                            <th scope="col">Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{{ $offer->vehiclestatus }}</td>
                                        <td>{{ $offer->id_engine }}</td>
                                        <td>{{ $offer->drive }}</td>
                                        <td>{{ $offer->countrys->name }}</td>
                                        <td>{{ $offer->steeringwheel }}</td>
                                        <td>{{ $offer->location }}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col">Additionalequipment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>{{ $offer->equipments->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            @endforeach
        </div>
    </div>
@endsection
