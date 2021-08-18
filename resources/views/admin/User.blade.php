@extends('admin.home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>

            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <h3>IMG</h3>
                        <h2 class="text-center">{{ $user->name }}</h2>
                        <h2>ID: {{ $user->id }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>
        </div>
    </div>

@endsection
