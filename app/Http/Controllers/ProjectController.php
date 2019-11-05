<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Resources\Project\EditProjectResource;
use App\Project;
use App\Task;
class ProjectController extends Controller
{
 
    public function addProject(Request $request)
    {
       
        $this->validate($request, [
            'project_name' =>  'required',
            'client_name' => 'required',
            'main_contributor' => 'required',
            'project_budget' => 'required',
            'project_length' => 'required',
            'responsible_team' => 'required',     
        ]);

        $addProject = new Project();
        $addProject->project_name = $request->project_name;
        $addProject->client_name = $request->client_name;
        $addProject->main_contributor = $request->main_contributor;
        $addProject->project_budget = $request->project_budget;
        $addProject->project_length = $request->project_length;
        $addProject->project_brief = $request->project_brief;
        $addProject->responsible_team = $request->responsible_team;
        $addProject->save();

        
        return response()->json(['success' => 'Project added successfully. :)'], 201);
        
       
    }

    public function allProject(){

        return ProjectCollection::collection(Project::all());

    }

    public function projectDetailsAndTasks($projectId){
        
        return new ProjectResource(Project::with(['tasks'])->where('id', $projectId)->firstOrFail());

    }
    
    public function addTask(Request $request, $projectId)
    {
        $this->validate($request, [
            'task' => 'required'
        ]);

        $addTask = new Task();
        $addTask->task = $request->task;
        $addTask->project_id = $projectId;
        $addTask->is_completed = 0;
        $addTask->save();

        return response()->json(['success' => 'Task added successfully. :)'],201);
        
    }
    public function changeIsCompleted(Request $request,$taskId)
    {
        $changeIsCompleted = Task::find($taskId);
        $changeIsCompleted->is_completed = $request->is_completed;
        $changeIsCompleted->save();
        
        return response()->json(['success' => 'Successfully task status changed. :)'], 202);
        
    }

    public function changeCompetitionStatus(Request $request, $projectId) 
    {
        $changeCompetitionStatus = Project::find($projectId);
        $changeCompetitionStatus->completion_status = $request->completion_status;
        $changeCompetitionStatus->save();
        return response()->json(['success' => 'Successfully changed completion status. :)'], 202);
    }

    public function completed($projectId){
        $deleteProject = Project::find($projectId);
       // $deleteProject->delete();
        
        return response()->json(['success'=> 'Project deleted Successfully. :)', 202]);
        
    }

    public function getEditProjectInfo($projectId)
    {
        return new EditProjectResource(Project::where('id', $projectId)->first());
    }

    public function updateProject(Request $request,$projectId)
    {
        $this->validate($request, [
            'project_name' =>  'required',
            'client_name' => 'required',
            'main_contributor' => 'required',
            'project_budget' => 'required',
            'project_length' => 'required',
            'responsible_team' => 'required',     
        ]);

        $updateProject =  Project::find($projectId);
        $updateProject->project_name = $request->project_name;
        $updateProject->client_name = $request->client_name;
        $updateProject->main_contributor = $request->main_contributor;
        $updateProject->project_budget = $request->project_budget;
        $updateProject->project_length = $request->project_length;
        $updateProject->project_brief = $request->project_brief;
        $updateProject->responsible_team = $request->responsible_team;
        $updateProject->save();

        
        return response()->json(['success' => 'Project Updated successfully. :)'], 201);
         
    }
}
