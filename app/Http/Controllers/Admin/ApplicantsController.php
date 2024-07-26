<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BioData;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    public function index()
    {
        // $applicants = BioData::with('user')->paginate(15);
        return view('admin.applicants.index');
    }

    public function show($id)
    {
        $applicant = BioData::findOrFail($id);
        return view('admin.applicants.show', compact('applicant'));
    }

    public function edit($id)
    {
        $applicant = BioData::findOrFail($id);
        return view('admin.applicants.edit', compact('applicant'));
    }

    public function update(Request $request, $id)
    {
        $applicant = BioData::findOrFail($id);
        // Add validation and update logic here
    }

    public function destroy($id)
    {
        $applicant = BioData::findOrFail($id);
        $applicant->delete();
        return redirect()->route('dashboard')->with('success', 'Applicant deleted successfully');
    }

    public function export()
    {
        // Add export to Excel logic here
    }
}
