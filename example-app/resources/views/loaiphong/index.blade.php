@extends('layout')
@section('content')
    <table class="table">
        <tr class="primary">
            <td>ID</td>
            <td>Loại Phòng</td>
            <td>Thao tác</td>
        </tr>
        @foreach($loaiPhongs as $st)
        <tr>
            <td>{{$st->id}}</td>
            <td>{{$st->name}}</td>
            <th>
            <button  class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('route_loaiphong_edit',['id'=>$st->id])}}">Sửa</a></button>
            <button  class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('route_loaiphong_delete',['id'=>$st->id])}}">Xóa</a></button>
            </th>
        </tr>
        @endforeach
    </table>
    <button  class="btn btn-primary ml-3 "><a style="text-decoration: none; color: white;" href="/add">Thêm</a></button>
@endsection
