@extends('user.header')
@section('user-body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Gallery -->
    <div class="row">

        @foreach($result as $value)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="d-block services-wrap text-center">
                <img src="/files/{{$value->filename}}" class="w-100 shadow-1-strong rounded mb-4" />
                <h3 class="heading">{{$value->name}}</h3>
                <p>{{$value->description}}</p>
                <p><a href="/bookturf/{{$value->id}}" class="btn btn-primary">Book</a></p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection