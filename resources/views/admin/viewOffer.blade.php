@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="img text-center">
                            <img src="{{ $offer['photo'] }}" class="img-fluid">
                        </div>
                        <div class="text mt-4">
                            <h3 class="text-center">{{ $offer['carname'] }}</h3>
                            <h4 class="text-right">Cena: {{ $offer['price'] }} zł</h4>
                        </div>

                        <div class="table-responsive">
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
                                    <td>{{ $offer['carname'] }}</td>
                                    <td>{{ $offer['id_carmodel'] }}</td>
                                    <td>{{ $offer['id_bodytype'] }}</td>
                                    <td>{{ $offer['fueltype'] }}</td>
                                    <td>{{ $offer['course'] }}</td>
                                    <td>{{ $offer['yearproduction'] }}</td>
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
                                    <td>{{ $offer['vehiclestatus'] }}</td>
                                    <td>{{ $offer['id_engine'] }}</td>
                                    <td>{{ $offer['drive'] }}</td>
                                    <td>{{ $offer['id_country'] }}</td>
                                    <td>{{ $offer['steeringwheel'] }}</td>
                                    <td>{{ $offer['location'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <a href="{{ url()->previous() }}">
                                <button type="button" class="btn btn-outline-dark col-sm-3">Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="card-text">{{ $offer['description'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
@endsection
