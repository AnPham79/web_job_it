<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;
use App\Exports\PostsExport;
use App\Models\Company;
use App\Imports\PostsImport;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class PostsController extends Controller
{
    public function index()
    {
        $data = Post::paginate();

        return view('Admin.posts.index', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $companies = Company::query()->get();
        return view('Admin.posts.create');
    }

    public function exportIntoExcel(Excel $excel) {
        return $excel->download(new PostsExport, 'postslist.xlsx');
    }

    public function exportIntoCSV(Excel $excel) {
        return $excel->download(new PostsExport, 'postslist.csv');
    }

    public function formImportIntoExcel()
    {
        return view('Admin.posts.importForm');
    }

    public function importIntoExcel(Request $request, Excel $excel) 
    { 
        $excel->import(new PostsImport, $request->file);
    }
}
