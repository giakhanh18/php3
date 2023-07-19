@extends('layout')
@section('content')
<form action="{{route('route_loaiphong_edit',['id'=>$loaiPhongs->id])}}" method="POST">
    @csrf
     <h1 class="ml-5 mb-3">Sửa Loại Phòng </h1>
    <div class="mb-5 ml-5">
    <label class="form-label"><h5>Loại Phòng</h5></label>
      <input type="text" name="name" value="{{$loaiPhongs->name}}"  class="form-control ">
    </div>
    <button type="submit" class="btn btn-primary ml-5">Submit</button>
    <button  class="btn btn-primary "><a style="text-decoration: none; color: white;" href="/list">Về Trang Danh Sách</a></button>
  </form>
@endsection