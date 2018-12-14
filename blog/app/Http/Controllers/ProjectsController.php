<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
/* use Illuminate\Support\Facades\Mail;*/
/* use App\Mail\ProjectCreated; */
use App\Events\ProjectCreated;

class ProjectsController extends Controller
{
    public function __construct(){
       $this->middleware('auth');

        //$this->middleware('auth')->only(['store','update']);
        //$this->middleware('auth')->except(['store','update']);
    }

    public function index(){
        
        $projects = auth()->user()->projects; 

       //$projects = Project::where('owner_id', auth()->id())->get();

       dump($projects);

        /* 
        Auth Helper Method

        auth()->id() // 4
        auth()->user // User Object
        auth()->check() //User Login or not boolean
        auth()->guest() //Guest login or not boolean
        
        */

        //$projects = Project::all();

        return view('projects.index',[
            'projects' => $projects
        ]);

        // return view('projects.index',cpmpact('projects'));
    }

    public function create(){

        return view('projects.create');
    }

    public function show(Project $project){ //$id

        /* if($project->owner_id !== auth()->id()){
            abort(403);
        } */

       /*  abort_if($project->owner_id !== auth()->id(),403); */

       /* abort_unless(auth()->user()->owns($project),403); */

       /* abort_unless(\Gate::allows('update', $project),403);*/
       /* if(\Gate::denies('update', $project)){
           abort(403);
       } */

       $this->authorize('update',$project);


        return view('projects.show',compact('project'));
    }

    public function store(){

        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);

        $attributes['owner_id'] = auth()->id();
        
        $project = Project::create($attributes);
        
        event(new ProjectCreated($project));
        
        /* Project::create($attributes); */

       /*  $project = Project::create($attributes);

        \Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
        ); */

       // Project::create(request(['title','description']));
        // $projects = new Project();

        // $projects->title = request('title');

        // $projects->description = request('description');

        // $projects->save();
        
        return redirect('/projects');
    }

    public function edit(Project $project){

        $this->authorize('update',$project);

    
        return view('projects.edit',compact('project'));
    }

    public function update(Project $project){

        $project->update(request(['title', 'description']));
        // $project->title = request('title');

        // $project->description = request('description');

        // $project->save();

        return redirect('/projects');
    }

    public function destroy(Project $project){

        /* $this->authorize('update',$project); */

    
        $project->delete();

        return redirect('/projects');
    }
}
