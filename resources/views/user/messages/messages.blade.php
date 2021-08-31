@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <div class="row">
                    <!-- if($ToUser) foreachTouser related messages with users -->
                    @if (!empty($ToUser))
                        <div class="card card-body p-0">
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                                    <div class="row p-0">
                                        <div class="col-sm-3 mt-2">
                                            <img src="{{ asset('/storage/' . $ToUser->avatar) }}"
                                                class="img-fluid rounded-circle" style="height:45px;">
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="mb-1">{{ $ToUser->name }}</h5>
                                            @if (count($messagesTo) > 0)
                                                <p class="mb-1">Its message</p>
                                            @else
                                                <p class="mb-1">Test messages info.</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                @if (!empty($ToUser) && !empty($Offer))
                    <div class="card p-0">
                        <div class="card-header text-center text-white bg-dark">
                            <div class="row p-0">
                                <div class="col-sm-4 text-start mt-1">
                                    <a href="{{ route('user.ShowMessages') }}">
                                        <button type="button" class="btn-close btn-close-white" aria-label="Close">
                                        </button>
                                    </a>
                                </div>

                                <div class="col-sm-4 text-center">
                                    <img src="{{ asset('/storage/' . $ToUser->avatar) }}"
                                        class="img-fluid rounded-circle p-0 m-0" style="height:30px">
                                    <span class="h4 ms-2">{{ $ToUser->name }}</span>
                                </div>

                                <div class="col-sm-4">

                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0" style="background: #D4D9DB">
                            <div class="container-fluid ps-1 overflow" style="height: 600px">
                                <div class="row">
                                    @if (!empty($messagesTo))
                                        @foreach ($messagesTo as $message)
                                            <div class="col-sm-12  mt-1 p-0">
                                                <div class="@if ($message->idFromUser === Auth::id()) bg-primary ms-3 @else bg-white float-end  @endif col-sm-3 rounded-pill">
                                                    @if ($message->idFromUser === Auth::id())
                                                        <span class="ps-3"><b>You</b></span>
                                                    @else
                                                        <span class="ps-3"><b>{{ $ToUser->name }}</b></span>
                                                    @endif
                                                    <p class="@if ($message->idFromUser === Auth::id()) text-white @else text-dark @endif text-start ps-3 p-0 m-0 ">
                                                        {{ $message->messages }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card card-body bg-dark pb-0">
                        <div class="row p-0">
                            <div class="col-sm-8 ps-0 pe-0">
                                <form
                                    action="{{ route('user.sendMessage', ['id_offer' => $Offer->id, 'idToUser' => $ToUser->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="text" name="message" class="col-sm-12 rounded-3 border-1 border-dark">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-sm btn-light col-sm-12 mb-1 rounded-pill">Send</button>
                            </div>
                            </form>
                        </div>
                    </div>
                @endif
                @if (!empty($users))
                    <div class="card card-body p-0" style="height: 500px">
                        <div class="list-group">
                            @foreach ($users as $user)
                                <a href="{{ route('user.MessagesOffer', ['idOffer' => $user->messages->id_offer, 'ToUser' => $user->messages->idFromUser]) }}"
                                    class="list-group-item list-group-item-action" aria-current="true">

                                    <div class="row p-0">
                                        <div class="col-sm-3 mt-2">
                                            <img src="{{ asset('/storage/' . $user->avatar) }}"
                                                class="img-fluid rounded-circle" style="height:50px;">
                                        </div>
                                        <div class="col-sm-7">
                                            <h4 class="mb-1 text-center">{{ $user->name }}</h4>
                                            <h5 class="mb-1 text-start bg-primary text-white rounded-pill ps-2">
                                                {{ $user->messages->messages }}</h5>
                                        </div>
                                        <div class="col-sm-2">
                                            Zamknij ,usun itp
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
            </div>
            @endif
        </div>

        <div class="col-sm-3">
            @if (!empty($Offer))
                <div class="card">
                    <h4 class="card-header text-center bg-dark text-white">Question for Offer</h4>
                    <div class="card-body p-0 border border-dark rounded-3">
                        <img class="img-fluid" src="{{ $Offer->photo }}" style="height: 100px,width:100%;">
                        <h5 class="card-text text-center"><b>{{ $Offer->carname }}</b></h5>
                        <p class="card-text h5 text-end">
                            Price: <b>{{ $Offer->price }}</b> $
                        </p>
                        <div class="row mb-1">
                            <div class="col-sm-7">
                                <div class="p-0 m-0">
                                    <ul class="list-group">
                                        <li class="list-group-item p-0">
                                            <b>Course:</b> {{ $Offer->course }} <b>km</b>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="p-0 m-0">
                                    <ul class="list-group">
                                        <li class="list-group-item p-0">
                                            <b>Yearproduction:</b> {{ $Offer->yearproduction }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-10">
                                <div class="p-0 m-0">
                                    <ul class="list-group">
                                        <li class="list-group-item p-0">
                                            <b>Vehiclestatus:</b> {{ $Offer->vehiclestatus->name }}
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
                            {{ $Offer->location }}
                        </p>

                        <div class="row">
                            <div class="col-sm-8 text-end p-0">
                                <a href="{{ route('ShowOffer', ['id' => $Offer->id]) }}">
                                    <button type="button" class="btn btn-sm btn-dark col-sm-10">Check</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
@endsection
