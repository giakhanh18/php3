<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhongRequest;
use App\Models\LoaiPhong;
use App\Models\Phong;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PhongController extends Controller
{
    public function index(Request $request){
        // $phong = DB::table('phong')
        // ->join('loaiphong', 'loaiphong.id', '=', 'phong.maloai')
        // ->select('phong.*', 'loaiphong.name')
        // ->get();

    //    $phong = DB:: table('phong')->get();
    //    return view("phong.index",compact('phongs'));
    
        $phongs = DB::table('phong')
        ->select('id','name','image','price','mota','maloai')
        ->whereNULL('deleted_at')
        ->get();
        // if($request->post() && $request->email){
        //     // ấn vào thì nhảy vào đây 
        //     $phongs = DB::table('phong')
        //     ->select('id','name','image','price','mota')
        //     ->get();
        // }
        return view('phong.index', compact('phongs'));
    }
    public function addp(PhongRequest $request){
        $maphongs = DB::table('loaiphong')->get();
        //khi ng dùng ấn post thì mới post
        if($request->isMethod('post')){
            $params = $request->except('_token');
            // dd($params);
            //nếu như tồn tại file post lên
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image']= uploadFile('hinh',$request->file('image'));
            }
            $phongs = Phong::create($params);
            // $phong= Phong::create($request->except('_token'));
            if($phongs->id){
                Session::flash('success','them thanh cong');
                return redirect()->route('route_phong_add');
            }
            // dd(123);
        }
        return view('phong.add',compact('maphongs'));
    }
    public function editp(PhongRequest $request,$id){
        $maphongs = DB::table('loaiphong')->get();
        $phongs=Phong::find($id);
        // dd($student);
        if($request->isMethod('post')){
            $params = $request->except('_token');
            // Student::where('id',$id);
            if($request->hasFile('image') && $request->file('image')->isValid()){
                
                $resultDL= Storage::delete('/public/'.$phongs->image);
                if($resultDL){
                    $params['image']= uploadFile('hinh',$request->file('image'));
                }
            }else{
                $params['image']=$phongs->image;
            }
            $result=Phong::where('id',$id)
            ->update($params);
              if ($result) {
               Session::flash('success','sửa thành công ');
               return redirect()->route('route_phong_edit',['id'=>$id]);
           }
        }
        return view('phong.edit',compact('phongs','maphongs'));
    }
    public function deletep($id){
        Phong::where('id',$id)
        ->delete();
        Session::flash('success','xoa thành công '.$id);
        return redirect()->route('route_phong_index');
    }
}
