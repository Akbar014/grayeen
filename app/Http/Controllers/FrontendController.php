<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Projectimage;
use App\Models\Slider;

class FrontendController extends Controller
{
    public function catProject($id)
    {
        $category = Category::find($id);
        $projects = Project::where('category_id', $id)->get();
        // dd($project);
        return View('frontend.project.allproject', compact('category', 'projects'));
    }

    public function projectDetails($id)
    {
        $category = Category::find($id);
        $project = Project::find($id);
        // dd($project->ptitle);
        $projectimage = Projectimage::where('project_id', $id)->get();

        return View('frontend.project.projectDetails', compact('category', 'project', 'projectimage'));
    }

    public function about()
    {
        return view('frontend.about.index');
    }

    public function contact()
    {
        $slider = Slider::all();

        return view('frontend.contact.index', compact('slider'));
    }
}
