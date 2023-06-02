@extends('header')
@section('turf-body')

<div class="hero-wrap js-fullheight" style="background-image: url('images/turf.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-7 ftco-animate">
                <h2 class="subheading">Welcome to E-TURF</h2>
                <h1 class="mb-4">choose your favourite spot and enjoy</h1>
            </div>
        </div>
    </div>
</div>

    <section class="ftco-section ftco-services">
        <div class="container">
            <div class="row">
                @foreach($result as $value)
                <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                    <div class="d-block services-wrap text-center">
                        <div class="img" style="background-image: url('/files/{{$value->filename}}');">{{$value->filename}}</a></div>
                        <div class="media-body py-4 px-3">
                            <h3 class="heading">{{$value->name}}</h3>
                            <p>{{$value->description}}</p>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection