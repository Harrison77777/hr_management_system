<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Qualification;
class QualificationController extends Controller
{
    public function allPlace()
    {
        $allQualification = Qualification::select(['id','place_name', 'education_qualification', 'skill_qualification'])->get();
        
        return response()->json(['data' => $allQualification], 200);
        
    }

    public function addPlace(Request $request)
    {
        $this->validate($request, [
            'place_name' => 'required',
            'education_qualification' => 'required',
            'skill_qualification' => 'required',
        ]);

        $addPlace = new Qualification();
        $addPlace->place_name = $request->place_name;
        $addPlace->education_qualification = $request->education_qualification;
        $addPlace->skill_qualification = $request->skill_qualification;
        $addPlace->save();
        
        return response()->json(['success' => 'Added new Place & requirements successfully'], 201);
        
    }

    public function editPlaceInfo($placeId)
    {
        $editPlaceInfo = Qualification::where('id', $placeId)->select(['id','place_name', 'education_qualification', 'skill_qualification'])->firstOrFail();
        
        return response()->json(['data' => $editPlaceInfo], 200);
        
    }

    public function updatePlaceInfo(Request $request, $placeId)
    {
        $this->validate($request, [
            'place_name' => 'required',
            'education_qualification' => 'required',
            'skill_qualification' => 'required',
        ]);

        $updatePlace =  Qualification::find($placeId);
        $updatePlace->place_name = $request->place_name;
        $updatePlace->education_qualification = $request->education_qualification;
        $updatePlace->skill_qualification = $request->skill_qualification;
        $updatePlace->save();
        
        return response()->json(['success' => 'Data updated successfully'], 202);
    }

    public function detailsPlaceInfo($placeId)
    {
        $detailsPlaceInfo = Qualification::where('id', $placeId)->select(['id','place_name', 'education_qualification', 'skill_qualification'])->firstOrFail();
        
        return response()->json(['data' => $detailsPlaceInfo], 200);
    }

}
