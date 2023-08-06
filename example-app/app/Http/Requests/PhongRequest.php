<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
       $rule = [];
       $currdentAction = $this->route()->getActionMethod();
        switch($this->method()):
           case 'POST':
            switch($currdentAction):
                case'addp':
                  $rule = [
                     "name"=> "required",
                     'image'=>"required|image|mimes:jpeg,jpg,png|max:5120",
                     "price"=> "required",
                     "mota"=> "required",
                     "maloai"=> "required"
                  ]; 
                break;

                // case'edit':
                // $rule = [
                //     "name"=> "required"
                //  ]; 
                // break;  

            endswitch;   
        endswitch;   
            return $rule;
    }
    public function messages()
    {
     return[      
         "name.required"=>"bắt buộc phải nhập name "
     ];
    }
}
