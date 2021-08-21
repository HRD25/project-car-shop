@extends('layouts.app')

@section('content')
    <div class="row mt-2">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header text-center p-0 m-0 bg-dark text-white">
                    <div class="row p-0 m-0">
                        <div class="col-sm-3 text-start mt-3 ms-2 ps-2">
                            <a href="{{ route('home') }}">
                                <button type="button" class="btn-close btn-close-white" aria-label="Close">
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-5 text-center">
                            <h1>Settings</h1>
                        </div>
                    </div>
                </div>
                <div class="card-body m-0 pt-0">
                    <div class="row">
                        <form action="{{ route('user.settingschange', ['id' => $user->id]) }}" method="POST" class="row"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="col-sm-4 m-1 p-3 text-center">
                                @if ($user->avatar)
                                    <img src="{{ asset('/storage/' . $user->avatar) }}" class="img-fluid rounded"
                                        style="width: 100%;">
                                @else
                                    <img src="https://packback.pl/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png"
                                        class="img-fluid rounded" style="width: 100%;">
                                @endif
                                <input type="file" name="photo" value="null" class="mt-1">
                            </div>

                            <div class="col-sm-3 m-0 p-0 text-center ">

                            </div>

                            <div class="col-sm-3 m-0 p-0 text-center">
                                <span>E-mail: </span><input type="email" name="email" value="{{ $user->email }}">
                                <span>ActivePassword:</span><input type="password" name="activepassword">
                                <span>NewPassword:</span><input type="password" name="newpassword">
                                <div class="mt-2">
                                    <button class="btn-sm btn-dark col-sm-3" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-2"></div>
    </div>

@endsection
