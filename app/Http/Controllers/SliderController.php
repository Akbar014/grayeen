<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slider = Slider::orderBy('position', 'asc')->get();

        return view('admin.slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
           
            
            
            $value = $request->file('image');
    $imageName = time().$value->getClientOriginalName();
    // $path = public_path('images/'.$imageName);
    $destinationPath = 'images/';
    $image = Image::make($value);
    $image->resize(1300, 530);
    $image->save($destinationPath.$imageName);
            // $image->resize(300, 200);
            // $path = public_path('images/'.time().$value->getClientOriginalName());
            // $imageName = time().$value->getClientOriginalName();
            // $image->save($path);
        } else {
            $slider = new Slider;
            // $slider->position = $request->position;
            $slider->description = $request->description;
            $slider->save();

            return back()->with('message', 'Slider Created successfully.');
        }

        $slider = new Slider;
        // $slider->position = $request->position;
        $slider->description = $request->description;
        $slider->image = $imageName;
        $slider->save();

        return redirect()->route('sliders.index')->with('messsage', 'Slider Created successfully.');
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
        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->position = $request->position;
        $slider->description = $request->description;
        $slider->status = $request->status;
        
         if ($request->hasFile('image')) {
            $value = $request->file('image');
            $imageName = time().$value->getClientOriginalName();
            $destinationPath = 'images/';
            $image = Image::make($value);
            $image->resize(1300, 530);
            $image->save($destinationPath.$imageName);
            $slider->image = $imageName;
        }
        $slider->update();
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        $image = $slider->image;

        $file_path = public_path('images'.DIRECTORY_SEPARATOR.$image);

        if (file_exists($file_path)) {
            unlink($file_path);
        } 
        $slider->delete();

        return redirect()->back()->with('message', 'Slider removed successfully ');
    }

    public function updateStatus(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->status = $request->input('status');
        $slider->save();

        return response()->json([$slider]);
    }

    public function updatePosition(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->position = $request->input('position');
        $slider->save();
        $other_sliders = Slider::where('id', '<>', $id)->get();

        // Update the positions of the other sliders
        foreach ($other_sliders as $other_slider) {
            if ($request->input('position') == 0) {
                $other_slider->position = 1;
            } else {
                $other_slider->position = 0;
            }
            $other_slider->save();
        }

        $updatedSlider = [
            'id' => $slider->id,
            'position' => $slider->position,
            // Add any other slider data you want to include in the response
        ];

        // Return a JSON response with the updated slider data
        return response()->json(['slider' => $updatedSlider]);
        // return response()->json(['message' => 'Slider status updated successfully']);
    }
}
