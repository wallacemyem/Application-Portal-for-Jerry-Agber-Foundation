<?php

namespace App\Http\Controllers;

use App\Models\BioData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        if ($type == 'job') {
            return view('bio_job');
        } elseif ($type == 'scholarship') {
            return view('bio_edu');
        } else {
            notify()->error('Not Availble');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_job(Request $request)
    {

        $messages = [
            'surname.required' => 'Your surname is required.',
            'first_name.required' => 'Your first name is required.',
            'phone.required' => 'Your phone number is required.',
            'cos.required' => 'Your course of study is required.',
            'cw.required' => 'Your council ward is required.',
            'fbp.url' => 'The Facebook profile must be a valid URL.',
            'lkp.url' => 'The LinkedIn profile must be a valid URL.',
            'xp.url' => 'The X profile must be a valid URL.',
            'lgco.required' => 'The Local Government Certificate of Origin is required.',
            'lgco.mimes' => 'The Local Government Certificate of Origin must be a file of type: pdf, doc, docx, jpeg, png, jpg.',
            'photo.mimes' => 'Passport Photo must be a file of type: jpeg, png, jpg.',
            'lgco.max' => 'The Local Government Certificate of Origin must not be larger than 2MB.',
        ];

        $validated = $request->validate([
            'surname' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'other_name' => 'nullable|string|max:100',
            'phone' => 'required|string|max:20',
            'cos' => 'required|string|max:100',
            'cw' => 'required|string|max:100',
            'fbp' => 'nullable|url|max:255',
            'lkp' => 'nullable|url|max:255',
            'xp' => 'nullable|url|max:255',
            'lgco' => 'required|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
            'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        if ($request->hasFile('ucv')) {
            $cvPath = $request->file('ucv')->store('cvs', 'public');
            $validated['lgco_file_path'] = $cvPath;
        }

        if ($request->hasFile('passport')) {
            $idPath = $request->file('passport')->store('passport', 'public');
            $validated['id_file_path'] = $idPath;
        }

        if ($request->hasFile('lgco')) {
            $lgcoPath = $request->file('lgco')->store('lgcos', 'public');
            $validated['lgco_file_path'] = $lgcoPath;
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photo', 'public');
            $validated['photo_file_path'] = $lgcoPath;
        }

        // $cvPath = $request->file('ucv')->store('cvs', 'public');
        // $idPath = $request->file('passport')->store('ids', 'public');
        // $lgcoPath = $request->file('lgco')->store('lgcos', 'public');

        $check_data = BioData::where('user_id', auth()->user()->id)->first();

        if ($check_data) {
            return redirect()->back()->with('error', 'You have already submitted your bio data. Please contact the administrator if you need to make changes.');
        }

        $bioData = new BioData();
        $bioData->surname = $request->surname;
        $bioData->first_name = $request->first_name;
        $bioData->other_name = $request->other_name;
        $bioData->phone = $request->phone;
        $bioData->course_of_study = $request->cos;
        $bioData->council_ward = $request->cw;
        $bioData->facebook_profile = $request->fbp;
        $bioData->linkedin_profile = $request->lkp;
        $bioData->x_profile = $request->xp;
        $bioData->cv_file_path = $cvPath;
        $bioData->id_file_path = $idPath;
        $bioData->lgco_file_path = $lgcoPath;
        $bioData->photo = $photoPath;
        $bioData->user_id = auth()->user()->id;
        $bioData->type = 1;

        $bioData->save();

        if (!$bioData) {
            return redirect()->back()->with('error', 'Bio data not submitted successfully!');
        }

        return redirect()->route('dashboard')->with('success', 'Bio data submitted successfully!');
    }

    public function store_edu(Request $request)
    {

        $messages = [
            'surname.required' => 'Your surname is required.',
            'first_name.required' => 'Your first name is required.',
            'phone.required' => 'Your phone number is required.',
            'cos.required' => 'Your course of study is required.',
            'cw.required' => 'Your council ward is required.',
            'fbp.url' => 'The Facebook profile must be a valid URL.',
            'lkp.url' => 'The LinkedIn profile must be a valid URL.',
            'xp.url' => 'The X profile must be a valid URL.',
            'lgco.required' => 'The Local Government Certificate of Origin is required.',
            'lgco.mimes' => 'The Local Government Certificate of Origin must be a file of type: pdf, doc, docx, jpeg, png, jpg.',
            'photo.mimes' => 'Passport Photo must be a file of type: jpeg, png, jpg.',
            'lgco.max' => 'The Local Government Certificate of Origin must not be larger than 2MB.',
        ];

        $validated = $request->validate([
            'surname' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'other_name' => 'nullable|string|max:100',
            'phone' => 'required|string|max:20',
            'cos' => 'required|string|max:100',
            'cw' => 'required|string|max:100',
            'fbp' => 'nullable|url|max:255',
            'lkp' => 'nullable|url|max:255',
            'xp' => 'nullable|url|max:255',
            'lgco' => 'required|file|mimes:pdf,doc,docx,jpeg,png,jpg|max:2048',
            'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        if ($request->hasFile('lgco')) {
            $lgcoPath = $request->file('lgco')->store('lgcos', 'public');
            $validated['lgco_file_path'] = $lgcoPath;
        }

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photo', 'public');
            $validated['photo_file_path'] = $lgcoPath;
        }

        $check_data = BioData::where('user_id', auth()->user()->id)->first();

        if ($check_data) {
            return redirect()->back()->with('error', 'You have already submitted your bio data. Please contact the administrator if you need to make changes.');
        }

        $bioData = new BioData();
        $bioData->surname = $request->surname;
        $bioData->first_name = $request->first_name;
        $bioData->other_name = $request->other_name;
        $bioData->phone = $request->phone;
        $bioData->course_of_study = $request->cos;
        $bioData->council_ward = $request->cw;
        $bioData->facebook_profile = $request->fbp;
        $bioData->linkedin_profile = $request->lkp;
        $bioData->x_profile = $request->xp;
        $bioData->lgco_file_path = $lgcoPath;
        $bioData->photo = $photoPath;
        $bioData->user_id = auth()->user()->id;
        $bioData->type = 2;

        $bioData->save();

        if (!$bioData) {
            return redirect()->back()->with('error', 'Bio data not submitted successfully!');
        }

        return redirect()->route('dashboard')->with('success', 'Bio data submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $app_data = BioData::where('user_id', auth()->user()->id)->first();
        return view('show_bio', compact('app_data'));
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
    public function destroy(string $id)
    {
        //
    }

    public function printView($id)
{
    $app_data = BioData::findOrFail($id);
    return view('applicant.print', compact('app_data'));
}
}
