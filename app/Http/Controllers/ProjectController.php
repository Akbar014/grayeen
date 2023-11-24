<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Projectimage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $project = Project::orderBy('priority', 'desc')->latest('updated_at')->get();

        return view('admin.project.index', compact('project'));
    }
    // public function details($id): View
    // {
    //     $project= Project::find($id);
    //     // dd($project);
    //     return view('admin.project.details',compact('project'));

    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $category = Category::all();

        return view('admin.project.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'ptitle' => 'required',

        ]);
        // dd($request);
        $project = new Project();
        $project['ptitle'] = $request->ptitle;
        $project['pclient'] = $request->pclient;
        $project['category_id'] = $request->category_id;
        $project['plocation'] = $request->plocation;
        $project['tba'] = $request->tba;
        $project['land_area'] = $request->land_area;
        $project['period'] = $request->period;
        $project['status'] = $request->status;
        $project['design_team'] = $request->design_team;
        $project['pdescription'] = $request->pdescription;
        $project->save();
        $position = 1;
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $simage) {
                
                
                $imageName = time().$simage->getClientOriginalName();
    
    $destinationPath = 'images/';
    $image = Image::make($simage);
    $image->resize(1300, 530);
    $image->save($destinationPath.$imageName);
                
                $projectimage = new Projectimage();
                $projectimage['project_id'] = $project->id;
                $projectimage['image'] = $imageName;
                $projectimage['position'] = $position;

                $projectimage->save();
               
                $position++;
            }
        }

        return redirect('/projects')->with('message', 'Project added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $project = Project::find($id);
        // dd($project);
        return view('admin.project.details', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $category = Category::all();
        $project = Project::find($id);

        return view('admin.project.edit', compact('project', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $project = Project::find($id);
        $project['ptitle'] = $request->ptitle;
        $project['pclient'] = $request->pclient;
        $project['category_id'] = $request->category_id;
        $project['plocation'] = $request->plocation;
        $project['tba'] = $request->tba;
        $project['land_area'] = $request->land_area;
        $project['period'] = $request->period;
        $project['status'] = $request->status;
        $project['video'] = $request->video;
        $project['design_team'] = $request->design_team;
        $project['pdescription'] = $request->pdescription;
        $project['priority'] = $request->priority;
        $project->save();

        return redirect()->route('projects.show', $project->id)->with('message', 'Project information updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        // $project = Project::find($id);
        // dd($project);
        // $project->delete();
        
        $project = Project::find($id);
    
    foreach ($project->images as $projectimage) {
        $imagePath = public_path('images/'.$projectimage->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $projectimage->delete();
    }
    
    $project->delete();
    return redirect()->back()->with('message','Project Deleted Successfully');
    }
}
