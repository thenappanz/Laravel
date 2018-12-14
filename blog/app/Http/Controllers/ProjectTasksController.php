<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\Project;

class ProjectTasksController extends Controller
{
    protected $guarded = [];


    public function  store(Project $project){

        $attributes = request()->validate(['description' => 'required']);

        $project->addTask($attributes);

        //$project->addTask(request( $attributes ));
        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);

        return back();
    }


    public function update(Task $task)
    {
        $method = request()->has('completed') ? 'complete' : 'incomplete';

        $task->$method();

         /* if(request()->has('completed')){
            $task->complete();
        }
        else {
            $task->incomplete();
        } */

        //request()->has('completed') ? 'complete' : 'incomplete';

        /* $task->complete(request()->has('completed')); 
        $task->update([
            'completed' => request()->has('completed')
        ]); */

        return back();
    }
}
