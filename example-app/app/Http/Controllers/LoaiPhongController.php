<?php

namespace App\Http\Controllers;

use App\Models\LoaiPhong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LoaiPhongRequest;
use Illuminate\Support\Facades\Session;

class LoaiPhongController extends Controller
{
    public function index (Request $request){
        $loaiPhongs = DB::table('loaiphong')
        ->select('id','name')
        ->whereNULL('deleted_at')
        ->get();
        return view('loaiphong.index',compact('loaiPhongs'));
     }
     public function add(LoaiPhongRequest $request){
          if($request->isMethod('POST')){
             $params = $request->except('_token');
             $loaiPhongs = LoaiPhong::create($params);

             if($loaiPhongs->id){
              Session::flash('success','them moi thanh cong');
              return redirect()->route('route_loaiphong_add');
           }
          }
             return view('loaiphong.add');
     }
     public function edit(LoaiPhongRequest $request,$id){
      $loaiPhongs =LoaiPhong::find($id);
      if($request -> isMethod('POST')){
        LoaiPhong::where('id',$id)
        ->update($request->except('_token'));
        if($request){
          Session::flash('success','sua thanh cong ');
          return redirect()->route('route_loaiphong_edit',['id'=>$id]);
      }
      }
      return view('loaiphong.edit',compact('loaiPhongs'));
  }
  public function delete($id){
    LoaiPhong::where('id',$id)
    ->delete();
    Session::flash('success','xoa thành công '.$id);
    return redirect()->route('route_loaiphong_index');
}
}
