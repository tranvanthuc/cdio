<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;

class ReportController extends Controller
{
    public function getReport()
    {
    	$list = Report::all();
    	return view('admin.report.report', compact('list'));
    }
}
