@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($offers as $offer)
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="img text-center">
                                <img src="{{ $offer->photo }}" class="img-fluid">
                            </div>
                            <div class="text mt-3">
                                <h3 class="text-center"><b>{{ $offer->carname }}</b></h3>
                                <h4 class="text-end">Price: <b>{{ $offer->price }}</b> zł </h4>
                                <hr class="mt-2 mb-2">
                                <div>
                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Fueltype:</b> {{ $offer->fueltype }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-2">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Course:</b> {{ $offer->course }} km
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-2">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Yearproduction:</b> {{ $offer->yearproduction }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="p-2">
                                            <ul class="list-group">
                                                <li class="list-group-item">
                                                    <b>Vehiclestatus:</b> {{ $offer->vehiclestatus }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row">
                                        <div class="p-2">
                                            <ul class="list-group">
                                                <li class="list-group-item">
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
                                <a href="{{ url()->previous() }}">
                                    <button type="button" class="btn btn-outline-dark col-sm-3">Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
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
                <div class="col-sm-4"></div>
            @endforeach
        </div>
    </div>
@endsection
