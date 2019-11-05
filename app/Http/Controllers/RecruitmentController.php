<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Vacancy\VacancyCollection;
use App\Http\Resources\Vacancy\VacancyResource;
use App\Vacancy;
class RecruitmentController extends Controller
{
    public function allVacancies()
    {
        $vacancies = Vacancy::all();
        return VacancyCollection::collection($vacancies);
    }

    public function addVacancy(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'total_needle' => 'required',
            'education_requirement' => 'required',
            'skill_requirement' => 'required',
             'all_opportunities' => 'required',
            'company_address' => 'required',
            'email' => 'required',
            'salary_range' => 'required',
        ]);

        $addVacancy = new Vacancy();
        $addVacancy->vacancy_name = $request->name;
        $addVacancy->needle_number = $request->total_needle;
        $addVacancy->education_requirement = $request->education_requirement;
        $addVacancy->skill_requirement = $request->skill_requirement;
         $addVacancy->all_opportunities = $request->all_opportunities;
        $addVacancy->company_address = $request->company_address;
        $addVacancy->company_mail_address = $request->email;
        $addVacancy->salary_range = $request->salary_range;
        $addVacancy->save();
        
        return response()->json(['success'=> 'Vacancy Added Successfully :)'], 202);
        
    }

    public function getVacancyInfoEdit($vacancyId)
    {
        $editInfo = Vacancy::find($vacancyId);
        return new VacancyResource($editInfo);
    }

    public function updateVacancy(Request $request,$vacancyId)
    {
        $this->validate($request, [
            'name' => 'required',
            'total_needle' => 'required|numeric',
            'education_requirement' => 'required',
            'skill_requirement' => 'required',
            'all_opportunities' => 'required',
            'company_address' => 'required',
            'email' => 'required|email',
            'salary_range' => 'required',
        ]);

        $updateVacancy = Vacancy::find($vacancyId);
        $updateVacancy->vacancy_name = $request->name;
        $updateVacancy->needle_number = $request->total_needle;
        $updateVacancy->education_requirement = $request->education_requirement;
        $updateVacancy->skill_requirement = $request->skill_requirement;
        $updateVacancy->all_opportunities = $request->all_opportunities;
        $updateVacancy->company_address = $request->company_address;
        $updateVacancy->company_mail_address = $request->email;
        $updateVacancy->salary_range = $request->salary_range;
        $updateVacancy->save();
        
        return response()->json(['success'=> 'Vacancy edited Successfully :)'], 202);
    }

    public function detailsVacancy($vacancyId)
    {
        $detailsVacancy = Vacancy::find($vacancyId);
        return new VacancyResource($detailsVacancy);
    }

    public function deleteVacancy($vacancyId){
        $deleteVacancy = Vacancy::find($vacancyId);
        $deleteVacancy->delete();
        
        return response()->json(['success'=>'Vacancy Deleted Successfully'], 200);
        
    }
}
