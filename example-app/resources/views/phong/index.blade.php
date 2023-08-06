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
            <td>Thao tác</td>
        </tr>
        @foreach($phongs as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td><img src="{{ $p->image?''.Storage::url($p->image):''}}" style="width: 100px" /></td>
                <td>{{$p->price}}</td>
                <td>{{$p->mota}}</td>
                <td>
                    <option value="{{$p->id}}">{{$p->maloai}}</option>
                </td>
                <th>
                <button  class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('route_phong_edit',['id'=>$p->id])}}">Sửa</a></button>
                <button  class="btn btn-primary"><a style="text-decoration: none; color: white;" href="{{route('route_phong_delete',['id'=>$p->id])}}">Xóa</a></button>
               
                
            </tr>
        @endforeach
    </table>
    <button  class="btn btn-primary ml-3 "><a style="text-decoration: none; color: white;" href="/addp">Thêm</a></button>
@endsection