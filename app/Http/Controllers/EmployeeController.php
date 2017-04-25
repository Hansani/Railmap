<?php

namespace App\Http\Controllers;

use App\DBModel\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function UpdateEmployee()
    {
        $employees = Employee::getAllEmployee();
        return view('administrator.employee_manager.main')->with('employees', $employees);
    }

    public function addEmployee(Request $request)
    {
        $this->validate($request, [
            'person_id' => 'max:6',
            'employee_id' => 'required|max:6',
            'nic' => 'required|max:20',
            'title' => 'required|max:10',
            'first_name' => 'required|max:30',
            'last_name' => 'required|max:30',
            'street_no' => 'required|max:5',
            'street_name' => 'required|max:30',
            'city' => 'required|max:30',
            'province' => 'required|max:30',
            'postal_code' => 'required|max:10',
            'email' => 'required|Max:30',
            'home_no' => 'max:20',
            'mobile_no' => 'required|max:20',
            'emergency_no' => 'required|max:20',
            'user_name' => 'required|max:30',
            'designation' => 'required|max:30',
            'password' => 'max:40'
        ]);

        $employee = new Employee();
        $employee->employee_id = $request['employee_id'];
        $employee->nic = $request['nic'];
        $employee->title = $request['title'];
        $employee->first_name = $request['first_name'];
        $employee->last_name = $request['last-name'];
        $employee->street_no = $request['street_no'];
        $employee->street_name = $request['street_name'];
        $employee->city = $request['city'];
        $employee->province = $request['province'];
        $employee->postal_code = $request['postal_code'];
        $employee->email = $request['email'];
        $employee->home_no = $request['home_no'];
        $employee->mobile_no = $request['mobile_no'];
        $employee->emergency_no = $request['emergency_no'];
        $employee->user_name = $request['user_name'];

        if (isset($_POST['Register'])) {
            $employee->password = $request['password'];
            $employee->insert();
        }else if (isset($_POST['Edit'])){
            $employee->person_id = $request['person_id'];
            $employee->update();
        }

    }
}
