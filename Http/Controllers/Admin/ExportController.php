<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MembersExport;

class ExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function export()
    {
        return view('admin.export.list');
    }
    // public function exportData(Request $request)
    // {
    //     $fromDate = $request->input('from_date');
    //     $toDate = $request->input('to_date');

        
    //     $formattedFromDate = date('Y-m-d', strtotime($fromDate));
    //     $formattedToDate = date('Y-m-d', strtotime($toDate));

    //     return Excel::download(new MembersExport($formattedFromDate, $formattedToDate), 'members.xlsx');
    // }


    public function exportData(Request $request)
    {
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');

        return Excel::download(new MembersExport($fromDate, $toDate), 'members.xlsx');
    }
}

