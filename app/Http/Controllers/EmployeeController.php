<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('add_employee');
    }
    public function Employees(){
        $employees=Employee::all;
    }
    public function store(Request $request){

        $data=array();
        $data['nid_no']=$request->nid_no;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['salary']=$request->salary;
        $data['city']=$request->city;
        $data['department']=$request->department;
        $data['store_name']=$request->store_name;
        $image = $request->file('photo');
            if($image){
            $image_name= rand(11,99);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employees/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
                if ($success) {

                $data['photo']=$image_url;
                $employee=DB::table('employees')
                            ->insert($data);
                if($employee){
                $notification=array(
                'message'=>'Successfully employee added',
                'alert-type'=>'success'
                );
                return Redirect()->route('home')->with($notification);
                }
                else{

                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success'
                    );
                return Redirect()->back()->with($notification);
            }
        }
                else{
            return Redirect()->back();
        }
       }
    }
}
