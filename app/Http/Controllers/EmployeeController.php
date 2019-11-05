<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Employee\EmployeeCollection;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Employee\EmployeeSalariesResource;
use App\Employee;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
class EmployeeController extends Controller
{
    public function addEmployee(Request $request)
    {
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'phone' => 'required|numeric',
            'salary' => 'required|numeric',
            'place' => 'required',
            'department' => 'required',
            'address' => 'required',
            'qualification' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg'
       ]); 

       $empPhoto = $request->file('photo');
       $addEmployee = new Employee();
       if ($request->hasFile('photo')) {
        
        $photoUniqueName = uniqid().'.'.$empPhoto->getClientOriginalExtension();
        $resizePhoto = Image::make($empPhoto)->resize(450,350)->save($photoUniqueName);

        if (!Storage::disk('public')->exists('employees')) {
           Storage::disk('public')->makeDirectory('employees');
        }
        Storage::disk('public')->put('employees/'.$photoUniqueName,$resizePhoto);
        unlink($photoUniqueName);
       
        $addEmployee->name = $request->name;
        $addEmployee->email = $request->email;
        $addEmployee->phone = $request->phone;
        $addEmployee->salary = $request->salary;
        $addEmployee->place = $request->place;
        $addEmployee->department_id = $request->department;
        $addEmployee->address = $request->address;
        $addEmployee->qualification = $request->qualification;
        $addEmployee->photo = $photoUniqueName;
        $addEmployee->employee_id = 'G-'.substr(md5(time()),5,7);
        $addEmployee->save();
        return response()->json(['success' => 'Employee added successfully :)'], 201);
        
       }
    }

    public function allEmployee()
    {
       return EmployeeCollection::collection(Employee::with('department')->paginate(10));
    }
    public function detailsEmployee($employeeId)
    {
       return new EmployeeResource(Employee::with('department')->where('id', $employeeId)->first());
    }

    public function searchEmployee($query,$search){
      return EmployeeCollection::collection(Employee::with('department')->where($query , 'LIKE' , "%$search%")->paginate(15));
    }

    public function updateEmployee(Request $request, $employeeId)
    {
       $this->validate($request,[
         'name' => 'required',
         'phone' => 'required|numeric',
         'department' => 'required',
         'salary' => 'required',
         'qualification' => 'required',
         'address' => 'required',
       ]);
       
       $updateInfo = Employee::find($employeeId);
       $updateInfo->name = $request->name;
       $updateInfo->phone = $request->phone;
       $updateInfo->department_id = $request->department;
       $updateInfo->salary = $request->salary;
       $updateInfo->qualification = $request->qualification;
       $updateInfo->address = $request->address;
       $updateInfo->save();

       return response()->json(['success'=> 'Employee information updated Successfully :)'], 200);
       
    }
   public function EmployeeSearchForPromotion($searchField)
   {
      $searchEmployee = Employee::with('department')->where('employee_id', $searchField)->first();
      if (!is_null($searchEmployee)) {
        return new EmployeeResource($searchEmployee);
      }else {
         
         return response()->json(['error' => 'Not Found'], 404);
         
      }
   }
   public function EmployeePromotion(Request $request,$employeeId)
   {
      $this->validate($request,[
         'promotion' => 'required'
      ]);

      $promotion = Employee::find($employeeId);
      $promotion->previous_place = $promotion->place;
      $promotion->place = $request->promotion;
      $promotion->save();
      
      return response()->json(['success'=> 'Successfully employee promoted :)'], 202);
      
   }

   public function EmployeeSalarySheets($employeeId)
   {

      

       return new EmployeeSalariesResource(Employee::where('id', $employeeId)->first());
     
       
      
   }

}
