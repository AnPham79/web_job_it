<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\view;
use Maatwebsite\Excel\Excel;
use App\Exports\UserExport;

class UserController extends Controller
{
    use SoftDeletes;

    private $model;
    private $table;

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
        $selectedCity = $request->get('city');
        $selectedCompany = $request->get('company');

        if ($selectedRole && in_array($selectedRole, ['HR', 'Applicant', 'Admin'])) {
            $query->where('role', $selectedRole);
        }

        if ($selectedCity) {
            $query->where('city', $selectedCity);
        }

        if ($selectedCompany) {
            $query->where('company_id', $selectedCompany);
        }

        $data = $query->paginate();

        $cities = Employee::distinct()->pluck('city');
        $companies = Company::query()->get();

        return view("Admin.employees.index", [
            'data' => $data,
            'selectedRole' => $selectedRole,
            'selectedCity' => $selectedCity,
            'selectedCompany' => $selectedCompany,
            'cities' => $cities,
            'companies' => $companies,
        ]);
    }


    public function destroy($id) 
    {
        Employee::destroy($id);

        return redirect()->back();
    }

    public function exportIntoExcel(Excel $excel) {
        return $excel->download(new UserExport, 'Employeelist.xlsx');
    }

    public function exportIntoCSV(Excel $excel) {
        return $excel->download(new UserExport, 'Employeelist.csv');
    }
}
