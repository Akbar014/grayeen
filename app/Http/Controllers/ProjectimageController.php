<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Projectimage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectimageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $project = Project::find($id);

        return view('admin.project.singleimage', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $newimage = new Projectimage();
        if ($request->hasFile('image')) {
            $value = $request->file('image');

            $image = Image::make($value);
            
            $image->resize(1300, 530);
            $destinationPath = 'images/';


            // $path = public_path('images/'.time().$value->getClientOriginalName());
            $imageName = time().$value->getClientOriginalName();
            $image->save($destinationPath.$imageName);
            $newimage->project_id = $request->project_id;
            $newimage->image = $imageName;
            $newimage->save();
        }

        // return back()->with('message','Image added successfully');
        return redirect()->route('projects.show', ['project' => $request->project_id])->with('message', 'Image added successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $projectimage = Projectimage::find($id);
         $imagePath = public_path('images/'.$projectimage->image);
        if ($projectimage->image) {
            unlink('images/'.$projectimage->image);
        }
        else {
            dd('File not found');
        }
        $projectimage->delete();

        return redirect()->back()->with('message', 'Image removed successfully ');
    }
}
