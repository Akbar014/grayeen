<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class OtherController extends Controller
{
    public function about()
    {
        $about = About::all();

        return view('admin.about.index', compact('about'));
    }

    public function aboutUpdate(Request $request, $id)
    {
        $about = About::find($id);
        if ($request->hasFile('image')) {
            $value = $request->file('image');
            $imageName = time().$value->getClientOriginalName();
            $destinationPath = 'images/';
            $image = Image::make($value);
            // $image->resize(1300, 530);
            $image->save($destinationPath.$imageName);
            $about->image = $imageName;
        }
        $about->description = $request->input('description');
        $about->save();

        return redirect()->back()->with('message', 'Data updated successfully.');
    }

    public function contact()
    {
        $contact = Contact::all();

        return view('admin.contact.index', compact('contact'));
    }

    public function contactUpdate(Request $request, $id)
    {
        // dd($request->all());
        $contact = Contact::find($id);
       
         if ($request->hasFile('image')) {
            $value = $request->file('image');
            $imageName = time().$value->getClientOriginalName();
            $destinationPath = 'images/';
            $image = Image::make($value);
            $image->resize(1300, 530);
            $image->save($destinationPath.$imageName);
            $contact->image = $imageName;
        }
        $contact['address1'] = $request->address1;
        $contact['address2'] = $request->address2;
        $contact['phone1'] = $request->phone1;
        $contact['phone2'] = $request->phone2;
        $contact['mail1'] = $request->mail1;
        $contact['mail2'] = $request->mail2;
        $contact['description'] = $request->description;
        $contact->save();

        return redirect()->back()->with('message', 'Data updated successfully.');
    }
}
