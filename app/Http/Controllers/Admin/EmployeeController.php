<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Empty_;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Employee $employee)
    {
        $employees = $employee->paginate(20);
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Job $job)
    {
        $jobs = $job->all();

        $page = 'create';

        return view('admin.employees.form', compact('jobs', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->job_id = $request->job_id;
        $employee->facebook = $request->facebook;
        $employee->twitter = $request->twitter;
        $employee->dribble = $request->dribble;
        if ($request->img != null) {

            $imageName = asset("uploads/" . time() . '.' . $request->img->extension());

            $request->img->move(public_path('uploads/'), $imageName);
            $employee->img = $imageName;
        }
        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = Job::all();

        $employees = Employee::findOrFail($id);

        $page = 'update';

        return view('admin.employees.form', compact('jobs', 'employees', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Employee $employees)
    {
        $employee = $employees->findOrFail($id);
        $employee->name = $request->name;
        $employee->job_id = $request->job_id;
        $employee->facebook = $request->facebook;
        $employee->twitter = $request->twitter;
        $employee->dribble = $request->dribble;
        if ($request->img != null) {

            $imageName = asset("uploads/" . time() . '.' . $request->img->extension());

            $request->img->move(public_path('uploads/'), $imageName);
            $employee->img = $imageName;
        }
        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        $employee->delete();

        return redirect()->route('employee.index')->with('message', 'Successfully deleted');
    }
}
