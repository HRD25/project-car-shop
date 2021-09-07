@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="user-wrapper">
                    <ul class="users">
                        @foreach ($users as $user)
                            <li class="user" id="{{ $user->id }}">
                                {{-- <input type="hidden" id="{{ $user->messages->id_offer }}" class="idoffer"> --}}
                                {{-- @if ($user->messages->is_read)
                                <span class="pending">{{$user->messages->is_read}}</span>
                            @endif --}}

                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{ asset('/storage/' . $user->avatar) }}" alt="" class="media-object">
                                    </div>

                                    <div class="media-body">
                                        <p class="name">{{ $user->name }}</p>
                                        <p class="email">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-8" id="messages">

            </div>
        </div>
    @endsection
