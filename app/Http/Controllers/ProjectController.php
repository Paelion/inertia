<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function index()
    {
        return Inertia::render('Project/Index', [
            'projects' => Project::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Project/Create');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return Inertia::render('Project/Edit', [
            'project' => $project
        ]);
    }

    public function update($id)
    {
        /*$slug = Str::slug(request()->get('name'));
           $data = array_merge(request()->all(), ['slug' => $slug]);

           $validator = Validator::make($data, [
               'name'      => 'required',
               'slug'      => 'required|unique:posts',
               'content'   => 'required',
               'published' => 'required',
           ]);


           if ($validator->fails()) {
               return redirect()->back()->withErrors($validator);
           }*/



        $project = Project::find($id);
        $project->client = request()->get('client');
        $project->lastname = request()->get('lastname');
        $project->firstname = request()->get('firstname');
        $project->phone = request()->get('phone');
        $project->email = request()->get('email');
        $project->title = request()->get('title');
        $project->description = request()->get('description');
        $project->start_date = request()->get('start_date');
        $project->end_date = request()->get('end_date');
        $project->status = request()->get('status');
        $project->paied_days = request()->get('paied_days');
        $project->save();

        return redirect()->route('project.index');
    }

    public function store()
    {
        /*$slug = Str::slug(request()->get('name'));
        $data = array_merge(request()->all(), ['slug' => $slug]);

        $validator = Validator::make($data, [
            'name'      => 'required',
            'slug'      => 'required|unique:posts',
            'content'   => 'required',
            'published' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }*/



        $project = new Project();
        $project->client = request()->get('client');
        $project->lastname = request()->get('lastname');
        $project->firstname = request()->get('firstname');
        $project->phone = request()->get('phone');
        $project->email = request()->get('email');
        $project->title = request()->get('title');
        $project->description = request()->get('description');
        $project->start_date = request()->get('start_date');
        $project->end_date = request()->get('end_date');
        $project->status = request()->get('status');
        $project->paied_days = request()->get('paied_days');
        $project->save();

        return redirect()->route('project.index');
    }

    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('project.index');
    }

}
