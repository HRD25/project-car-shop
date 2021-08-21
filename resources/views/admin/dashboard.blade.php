@extends('admin.home')

@section('content')
    <!-- INFO !-->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-4">
                <div class="card border border-dark">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center p-0">

                            </div>
                            <div class="col-sm-4 text-center p-0">
                                <h3>{{ $stats['Offers'] }}</h3>
                            </div>
                            <div class="col-sm-4 text-center p-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                    class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card border border-dark">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center p-0">

                            </div>
                            <div class="col-sm-4 text-center p-0">
                                <h3>{{ $stats['Sellers'] }}</h3>
                            </div>
                            <div class="col-sm-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-currency-exchange" viewBox="0 0 16 16">
                                    <path
                                        d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card border border-dark">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 text-center p-0">
                            </div>
                            <div class="col-sm-4 text-center p-0">
                                <h3>{{ $stats['Users'] }}</h3>
                            </div>
                            <div class="col-sm-4 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                    class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main !-->
    <div class="container-fluid p-0 mt-3">
        <div class="row p-0 m-0">
            <div class="col-sm-6 m-0">
                <div class="card border border-dark">
                    <h3 class="card-header text-center m-0 p-1 bg-dark text-white">Frequent Locations</h3>
                    <div class="card-body p-0">
                        <ul class="list-group">
                            @foreach ($offers as $offer)
                                <li class="list-group-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                                    </svg>
                                    {{ $offer->location }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 m-0">
                <div class="card border border-dark">
                    <h3 class="card-header bg-dark text-white m-0 p-1 text-center">New Offers</h3>
                    <div class="card-body p-0">
                        <table class="table table-responsive m-0 table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Photo</th>
                                    <th scope="col" class="text-center">CarName</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-center">Owner</th>
                                    <th scope="col" colspan="4" class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($offers as $offer)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $offer->photo }}" class="img-fluid rounded-pill"
                                                style="height: 40px;width:80px">
                                        </td>
                                        <td class="text-center">{{ $offer->carname }}</td>
                                        <td class="text-center"> {{ $offer->price }} $</td>
                                        <td class="text-center">{{ $offer->id_user }}</td>
                                        <td class="text-center">
                                            <div>
                                                <a href="{{ route('admin.offer', ['id' => $offer->id]) }}"
                                                    style="color: black" class="mr-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                                                        <path
                                                            d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
                                                    </svg>
                                                    view
                                                </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.editOffer', ['id' => $offer->id]) }}"
                                                style="color: black" class="mr-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                    width="16" height="16" fill="currentColor" class="bi bi-vector-pen"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                                                    <path fill-rule="evenodd"
                                                        d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z" />
                                                </svg>
                                                edit
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.deleteOffer', ['id' => $offer->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm bg-white border-0"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    value="{{ $offer->id }}" name="OfferId">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row p-0 m-0 bg-dark">
                            <div class="col-sm-4"></div>

                            <div class="col-sm-4">
                                {{ $offers->links('pagination::bootstrap-4') }}
                            </div>

                            <div class="col-sm-4"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
