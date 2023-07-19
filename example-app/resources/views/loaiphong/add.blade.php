@extends('layout')
@section('content')
<form action="{{route('route_loaiphong_add')}}" method="POST">
    @csrf
    <h1 class="ml-5 mb-3">Thêm Loại Phòng </h1>
    <div class="mb-5 px-5">
      <label class="form-label"><h5>Loại Phòng</h5></label>
      <input type="text" name="name" class="form-control">
    </div>
    
    <button type="submit" class="btn btn-primary ml-5 ">Thêm</button>
    <button  class="btn btn-primary "><a style="text-decoration: none; color: white;" href="/list">Về Trang Danh Sách</a></button>
  </form>
@endsection