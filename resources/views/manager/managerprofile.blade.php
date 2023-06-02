@extends('manager.header')
 @section('manager-body')
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
    </style>
    <title>manager_registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section class="h-100 h-custom" style="background-color: #8fc4b7;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp"
            class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
            alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>

            <form class="px-md-2" method="post" action="/managerprofileaction">
            @csrf
            @foreach($result as $value)
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" class="form-control" name="name" value="{{$value->name}}"/>
                <label class="form-label" for="form3Example1q">Name</label>
              </div>
              <div class="form-outline mb-4">
                <input type="email" id="form3Example1q" class="form-control" name="email" value="{{$value->email}}"/>
                <label class="form-label" for="form3Example1q">email</label>
              </div>
              <div class="form-outline mb-4">
                <input type="password" id="form3Example1q" class="form-control" name="password" value="{{$value->password}}"/>
                <label class="form-label" for="form3Example1q">password</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" class="form-control" name="address" value="{{$value->address}}"/>
                <label class="form-label" for="form3Example1q">address</label>
              </div>
              <div class="form-outline mb-4">
                <input type="text" id="form3Example1q" class="form-control" name="phone" value="{{$value->phone}}"/>
                <label class="form-label" for="form3Example1q">phone no</label>
              </div>
            </div>
            @endforeach

              <button type="submit" class="btn btn-success btn-lg mb-1">Update</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
</body>
</html>
@endsection