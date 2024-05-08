<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\view;

class UserController extends Controller
{
    use SoftDeletes;

    private object $model;
    private string $table;

    public function __construct()
    {
        $this->model = Employee::query();

        $this->table = ( new Employee() )->getTable();

        view::share('title', ucwords( $this->table));

        view::share('table', $this->table);

    }

    public function index(Request $request)
    {
        $query = $this->model->with('company:id,name');

        $selectedRole = $request->get('role');

        if ($selectedRole && in_array($selectedRole, ['HR', 'Applicant', 'Admin'])) {
            $query->where('role', $selectedRole);
        }

        $data = $query->paginate();

        return view("Admin.$this->table.index", [
            'data' => $data,
            'selectedRole' => $selectedRole
        ]);
    }

    public function destroy($employeeId) 
    {
        Employee::destroy($employeeId);

        return redirect()->back();
    }
}
