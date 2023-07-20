<?php

namespace App\Http\Controllers;
use App\Models\Phong;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PhongController extends Controller
{
    public function index(Request $request){
        $phongs = DB::table('phong')
        ->select('id','name','image','price','mota')
        ->get();
        if($request->post() && $request->email){
            // ấn vào thì nhảy vào đây 
            $phongs = DB::table('phong')
            ->select('id','name','image','price','mota')
            ->get();
        }
        return view('phong.index', compact('phongs'));
    }
    // public function add(Request $request){
    //     //khi ng dùng ấn post thì mới post
    //     if($request->isMethod('post')){
    //         $params = $request->except('_token');
    //         // dd($params);
    //         //nếu như tồn tại file post lên
    //         if($request->hasFile('image') && $request->file('image')->isValid()){
    //             $params['image']= uploadFile('hinh',$request->file('image'));
    //         }
    //         $student = Student::create($params);
    //         // $student= Student::create($request->except('_token'));
    //         if($student->id){
    //             Session::flash('success','them thanh cong');
    //             return redirect()->route('route_student_add');
    //         }
    //         // dd(123);
    //     }
    //     return view('student.add');
    // }
    // public function edit(Request $request,$id){
    //     $student=Student::find($id);
    //     // dd($student);
    //     if($request->isMethod('post')){
    //         $params = $request->except('_token');
    //         // Student::where('id',$id);
    //         if($request->hasFile('image') && $request->file('image')->isValid()){
                
    //             $resultDL= Storage::delete('/public/'.$student->image);
    //             if($resultDL){
    //                 $params['image']= uploadFile('hinh',$request->file('image'));
    //             }
    //         }else{
    //             $params['image']=$student->image;
    //         }
    //         $result=Student::where('id',$id)
    //         ->update($params);
    //           if ($result) {
    //            Session::flash('success','sửa  thành công sinh viên');
    //            return redirect()->route('route_student_edit',['id'=>$id]);
    //        }
    //     }
    //     return view('student.edit',compact('student'));
    // }
}
