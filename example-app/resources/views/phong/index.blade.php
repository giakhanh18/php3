@extends('Layout')
@section('content')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Image</td>
            <td>Price</td>
            <td>Mô tả</td>
            <td>Loại Phòng</td>
        </tr>
        @foreach($phongs as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td><img src="{{ $p->image?''.Storage::url($p->image):''}}" style="width: 100px" /></td>
            <td>{{$p->price}}</td>
            <td>{{$p->mota}}</td>
            
        </tr>
        @endforeach
    </table>
@endsection