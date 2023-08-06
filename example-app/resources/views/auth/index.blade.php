@extends('layout')
@section('content')
<table class="table">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>password</th>
        <th>Role</th>
    </tr>
    <tbody>
        @foreach ($account as $item)
            <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->role>0 ? "khách hàng" : "admin"}}</td>
            <td>
            <button type="button" class="btn btn-success"><a style="text-decoration: none; color:white" href="{{route('route_account_edit',['id'=>$item->id])}}">Sửa</a></button>
            <button type="button" class="btn btn-danger">  <a style="text-decoration: none; color:white" href="{{route('route_account_delete',['id'=>$item->id])}}">Xóa</a></button>
            </td>
            </tr>  
        @endforeach
    </tbody>
</table>
@endsection