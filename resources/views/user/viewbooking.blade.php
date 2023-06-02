@extends('user.header')
 @section('user-body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content-wrapper">
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Fixed Header Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>turfid</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>price</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($result as $value)
                    <tr>
                        <td>{{$value->userid}}</td>
                        <td>{{$value->turfid}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{$value->time}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
</div>
</body>
</html>
@endsection