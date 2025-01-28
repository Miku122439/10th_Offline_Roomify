@extends('layouts.app')

@section('title', 'Search')

@section('content')
<style>

    .card
    {
        background-color: #dcbf7d;
        border-radius: 30px;
        width: 360px;
    }

    .card-header
    {
        font-size: 24px;
        color: #004aad;

    }

    textarea
    {
        background-color: #ffffff;
    }

    .btn
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
        font-weight: bold;
    }

    .btn:hover
    {
        border-color:#004aad;
        color: #ffffff;
        background-color: #004aad;
    }
    .search-bar
    {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-left: 40px;
        font-size: 18px;
    }

    ::placeholder
    {
        text-align: center;
    }

    .form-select option
    {
        text-align: center
    }

    .input-group
    {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-group .input-icon
    {
        position: absolute;
        left:280px;
        top: 50%;
        transform: translateY(-50%);
        color: #dcbf7d;
        background-color:transparent;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 100%;
    }

    .input-group .form-control
    {
        padding-left: 2.5rem; /* Add padding to prevent text overlap with the icon */
        padding-right: 2.5rem; /* Add padding to prevent text overlap with the icon */
        border-radius: 10px;
        background-color: #ffffff;
    }
    .input-group-text
    {
        position: absolute;
        transform: translateY(-50%);
        border: none;
    }

    img
    {
        width: 270px;
        height: 200px;
    }
</style>

<div class="row gx-5 mx-3">
    <!-- search side -->
    <div class="col-4">
        <!-- address search -->
        <form action="{{ route('search_by_address')}}" method="get">
            @csrf
            @method("GET")

            <div class="card border-0">
                <div class="card-header">Place you want to stay</div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" style="border-radius:15px" name="address" placeholder="Address Search">
                        <button type="submit" class="btn input-icon input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </div>
        </form>

        <form action="#" method="get">
            <!-- capacity -->
            <div class="card border-0">
                <div class="card-header">Capacity</div>
                <div class="card-body">
                    <div class="search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_1">
                        <label class="form-check-label" for="capa_1">1 ~ 2 people</label>
                    </div>

                    <div class="search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_2">
                        <label class="form-check-label" for="capa_2">3 ~ 5 people</label>
                    </div>

                    <div class="search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_3">
                        <label class="form-check-label" for="capa_3">6 ~ 10 people</label>
                    </div>

                    <div class="search-bar">
                        <input type="radio" class="form-check-input" name="capacity" id="capa_4">
                        <label class="form-check-label" for="capa_4">More than 10 people</label>
                    </div>
                </div>
            </div>

            <!-- category -->
            <div class="card border-0">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" value="" id="">
                        <label class="form-check-label" for="">WI-FI</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Kitchen</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Nice View</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Parking</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">TV</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Air Conditioner</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Washer</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Hair Dryer</label>
                    </div>

                    <div class="search-bar">
                        <input type="checkbox" class="form-check-input" name="" id="">
                        <label class="form-check-label" for="">Refrigerator</label>
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="card border-0">
                <div class="card-header">Budget Range</div>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="min_price" class="form-label left-align">Minimum</label>
                        <input type="number" class="form-control" name="min_price">
                    </div>

                    <div class="mb-2">
                        <label for="max_price" class="form-label left-align">Maximum</label>
                        <input type="number" class="form-control" name="max_price">
                    </div>
                </div>
            </div>

            <div class="row my-4">
                <div class="col me-5">
                    <button type="submit" class="btn" style="width: 360px"><span class="fw-light">Search</span></button>
                </div>
            </div>
        </form>
    </div>

    <!-- results -->
    <div class="col-8">
        <div class="header">
            <p>Hits: {{ $all_accommodations->count() }}</p>
            <hr>
            @if(isset($all_accommodations) && $all_accommodations->count() > 0)
                @foreach($all_accommodations as $accommodation)
                    <a href="{{ route('accommodation.show', $accommodation->id )}}" class="row" style="color:black">
                        <div class="col">
                            <img src="#" alt="#">
                        </div>
                        <div class="col">
                            <h2 class="h4 fw-bold" style="color:#004aad">{{ $accommodation->name }}</h2>

                            <div>
                                <p><span><i class="fa-solid fa-magnifying-glass me-3"></i></span>{{ $accommodation->description}}</p>
                            </div>

                            <div>
                                <p><span><i class="fa-solid fa-location-dot me-3"></i></span>{{ $accommodation->address }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-money-bill me-3"></i></span>￥{{ $accommodation->price }}</p>
                            </div>

                            <div>
                                <p class="fw-bold"><span><i class="fa-solid fa-users me-3"></i></span>{{ $accommodation->capacity }}</p>
                            </div>
                        </div>
                    </a>
                    <hr>
                @endforeach
            @else
                <div class="alert">
                    No accommodations found.
                </div>
            @endif

        </div>

    </div>
</div>

<div class="d-flex justify-content-center">
    {{-- {{ $all_accommodations->links()}} --}}
</div>

@endsection
