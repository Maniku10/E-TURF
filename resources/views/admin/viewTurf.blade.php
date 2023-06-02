@extends('admin.header')
@section('admin-body')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Gallery -->
    <div class="row">

        @foreach($result as $value)
        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <div class="d-block services-wrap text-center">
                <img src="/files/{{$value->filename}}" class="w-100 shadow-1-strong rounded mb-4" />
                <h3 class="heading">{{$value->turfname}}</h3>
                <p>{{$value->description}}</p>
                <p>{{$value->manager}}</p>
                <p>{{$value->location}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection