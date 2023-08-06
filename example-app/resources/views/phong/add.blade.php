@extends('layout')
@section('content')

<form action="{{ route('route_phong_add') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="ml-5 mb-3">Thêm Loại Phòng </h1>
    <div class="mb-3 ml-5">  
        <label class="form-label">Tên Phòng</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3 ml-5">  
        <label class="form-label">Giá</label>
        <input type="text" class="form-control" name="price">
    </div>
    <div class="mb-3 ml-5">  
        <label class="form-label">Mô tả</label>
        <input type="text" class="form-control" name="mota">
    </div>
    <div>
    <div class="mb-3 ml-5"> 
    <label class="form-label">Danh mục</label>
    <select class="mb-3 ml-5" name="maloai" id="">
            @foreach($maphongs as $loai)
            <option value="{{$loai->id}}">{{$loai->name}}</option>
            @endforeach
    </select>
    </div>
    
    <div class="form-group mb-3 ml-5 ">
            <label class="col-md-3 col-sm-4 control-label">Ảnh</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                    <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                        <label for="cmt_truoc"></label><br/>
                    </div>
                </div>
            </div>
    </div>
    <button class="ml-3 ml-5 btn btn-primary" type="submit">Thêm</button>
    

</form>
@endsection
@section('script')
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_truoc").change(function () { //id ảnh của inp file 
            readURL(this, '#mat_truoc_preview');//id của ảnh để file
        });

    });
</script>
@endsection