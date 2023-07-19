<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiPhongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
       $rule = [];
       $currdentAction = $this->route()->getActionMethod();
        switch($this->method()):
           case 'POST':
            switch($currdentAction):
                case'add':
                  $rule = [
                     "name"=> "required"
                  ]; 
                break;

                case'edit':
                $rule = [
                    "name"=> "required"
                 ]; 
                break;  

            endswitch;   
        endswitch;   
            return $rule;
    }
    public function messages()
    {
     return[      
         "name.required"=>"bắt buộc phải nhập name ",
     ];
    }
}