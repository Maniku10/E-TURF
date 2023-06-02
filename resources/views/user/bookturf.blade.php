@extends('user.header')
@section('user-body')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">BookTurf</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                @foreach($result as $value)
                <form method="post " action="/booking/{{$value->id}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Turf name</label>
                            <input type="text" name="name" class="form-control" value="{{$value->turfname}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{$value->description}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{$value->price}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="{{$value->location}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" placeholder="Enter ...">
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" name="time" class="form-control" placeholder="Enter ...">
                        </div>


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ./wrapper -->
</body>

</html>
@endsection