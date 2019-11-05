<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Report\ReportCollection;
use App\Http\Resources\Report\ReportResource;
use App\Report;
class ReportController extends Controller
{
    public function addReport(Request $request)
    {
        $this->validate($request, [
            'employee_name' => 'required',
            'employee_id' => 'required',
            'report' => 'required',
        ]);
        $addReport = new Report();
        $addReport->employee_name = $request->employee_name;
        $addReport->employee_id = $request->employee_id;
        $addReport->report = $request->report;
        $addReport->save();
        
        return response()->json(['success' => 'Successfully Report Created. :)'], 201);
        
    }

    public function allReport(){
        return ReportCollection::collection(Report::all());
    }
    public function deleteReport($reportId)
    {
        $deleteReport = Report::find($reportId);
        $deleteReport->delete();
        return response()->json(['success' => 'Successfully Report Deleted. :)'], 202);
    }
    public function detailsReport($reportId){
        return new ReportResource(Report::find($reportId));
    }
}
