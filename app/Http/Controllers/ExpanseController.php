<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Expanse\ExpanseResource;
use App\Expanse;
class ExpanseController extends Controller
{
    public function addExpanse(Request $request)
    {
        $this->validate($request, [
            'details' => 'required',
            'amount' => 'required|numeric'
        ]);

        date_default_timezone_set('Asia/Dhaka');
        $addExpanse = new Expanse();
        $addExpanse->details = $request->details;
        $addExpanse->amount = $request->amount;
        $addExpanse->month = date('F');
        $addExpanse->date = date('d-m-Y');
        $addExpanse->year = date('Y');
        $addExpanse->save();
        
        return response()->json(['success'=>'Expanse added Successfully :)'], 202);
        
    }

    public function todayAllExpanse()
    {

        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y');
        $month = date('F');
        $year = date('Y');
        $todayAllExpanse = Expanse::where('date', $data)
        ->where('month', $month)
        ->where('year', $year)
        ->get();
        
        return response()->json(['data' => $todayAllExpanse], 200);
        
    }
    public function yesterdayAllExpanse()
    {

        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y', strtotime('-1 days'));
        $month = date('F');
        $year = date('Y');
        $yesterdayAllExpanse = Expanse::where('date', $data)
        ->where('month', $month)
        ->where('year', $year)
        ->get();
        
        return response()->json(['data' => $yesterdayAllExpanse], 200);
        
    }
    
    public function currentMonthAllExpanse()
    {
        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y', strtotime('-1 days'));
        $month = date('F');
        $year = date('Y');
        $currentMonthExpanses = Expanse::where('month', $month)->where('year', $year)->paginate(10);

        
        return ExpanseResource::collection($currentMonthExpanses);
    }

    public function currentMonthExpanseSearch($query, $searchField)
    {
        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y', strtotime('-1 days'));
        $month = date('F');
        $year = date('Y');

        $currentMonthExpansesSearch = Expanse::where($query, 'LIKE',  "%$searchField%")->where('month', $month)->where('year', $year)->paginate(10);
        
        
        
        return ExpanseResource::collection($currentMonthExpansesSearch);

    }
    public function todayAmountCount(){
        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y');
        $month = date('F');
        $year = date('Y');
        $todayAmountCount = Expanse::where('date', $data)
        ->where('month', $month)
        ->where('year', $year)
        ->get();
        $count = 0;
        foreach ($todayAmountCount as $value) {
            $count += $value->amount;
        }
        
        return response()->json(['todayAmountCount' => $count], 200); 
    }
    public function yesterdayAmountCount(){
        date_default_timezone_set('Asia/Dhaka');
        $data = date('d-m-Y', strtotime('-1 days'));
        $month = date('F');
        $year = date('Y');
        $yesterdayAmountCount = Expanse::where('date', $data)
        ->where('month', $month)
        ->where('year', $year)
        ->get();
        $count = 0;
        foreach ($yesterdayAmountCount as $value) {
            $count += $value->amount;
        }
        
        return response()->json(['yesterdayAmountCount' => $count], 200); 
    }
    public function currentMonthAmountCount(){
        date_default_timezone_set('Asia/Dhaka');
        $month = date('F');
        $year = date('Y');
        $currentMonthAmountCount = Expanse::where('month', $month)
        ->where('year', $year)
        ->get();
        $count = 0;
        foreach ($currentMonthAmountCount as $value) {
            $count += $value->amount;
        }
        
        return response()->json(['currentMonthAmountCount' => $count], 200); 
    }
}
