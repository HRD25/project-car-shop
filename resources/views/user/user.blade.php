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
                                    <img id="uploadPreview" style="width:100%;" class="img-fluid">
                                @endif
                                <input id="uploadPhoto" type="file" style="display: none" value="Browse" name="photo"
                                    onchange="PreviewImage();">
                                <button type="button" value="" class="btn-sm btn-dark border-0 col-sm-5 mt-2"
                                    onclick="document.getElementById('uploadPhoto').click();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1h-2z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                    </svg>
                                </button>
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

        <div class="col-sm-2">

        </div>
    </div>

@endsection
