<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Department\DepartmentDetailsResource;
use App\Department;
use App\Employee;
class DepartmentController extends Controller
{
    public function allDepartments(){
        $allDepartments = Department::select(['id', 'name'])->get();
        
        return response()->json(['data' => $allDepartments], 200);
        
    }
    public function addDepartment(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:departments,name'
        ]);

        $addDepartment = new Department();
        $addDepartment->name = $request->name;
        $addDepartment->save();
        
        return response()->json(['success' => 'Department added successfully :)'], 201);
        
    }
  public function deleteDepartment($departmentId){
      $deleteDepartment = Department::find($departmentId);
      $deleteDepartment->delete();
      
      return response()->json('Data deleted successfully :)', 202);
      
  }  
  public function detailsDepartment($departmentId){
      return new DepartmentDetailsResource(Department::with(['employees'])->where('id', $departmentId)->first());
  }
}
