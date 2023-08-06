@extends('layoutlogin')
@section('content')
    <!-- <form action="{{ route('login') }}" method="POST">
        @csrf
    <div class="mb-3 ">
        <label  class="form-label">Email address</label>
        <input type="email" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Pass</label>
        <input type="password" name="password" class="form-control"  >
    </div>
        <button type="submit" class="btn btn-success">Đăng nhập</button>
    </form> -->
    <form action="{{ route('login')}}" method="POST">
    @csrf
            <div class="form-row py-3 pt-5">
              <div class="offset-1 col-lg-10">
                    <input type="text" name="email" class="inp px-3" placeholder="UserName" required >
              </div>
            </div>
             <div class="form-row py-3">
              <div class="offset-1 col-lg-10">
                    <input type="password" name="password" class="inp px-3 " placeholder="Password" required>
              </div>
            </div>
            <div class="not">
              <p>Do not have an account ? <a href="login2.html"> Sign-up</a></p>
             </div>
            <div class="form-row py-3">
              <div class="offset-1 col-lg-10">
              <button type="submit" class="btn1">Đăng nhập</button>
              </div>
            </div>
          </form>
@endsection
