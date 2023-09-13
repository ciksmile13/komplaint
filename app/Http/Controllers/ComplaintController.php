<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::paginate(15);

        return view('complaint.index', [
            'complaints' => $complaints
        ]);

        // return view('complaint.index', compact('complaints'));
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
    public function store(StoreComplaintRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        return view('complaint.edit', [
            'complaint' =>$complaint 
            //$complaint 1 file sahaja nak edit so access kpd variable complaint
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        //dd($request->all()); //utk trace apa perubahan pastu mesti;

        //1. validate form data jika betul apa nak papar

        $request->validate([
        'title' =>['required', 'min:6', 'max:100'],
        'description'=> ['required']
    ]);

        //2. update the data
        $complaint->update([
            'title' =>$request->input('title'),
            'description'=> $request->input('description')
        ]);
        //3.redirect user to another page ke page papar / sama/lain2
        return back()->with('success', 'Record updated succesfully. apa nak diletak mesej');
        //dia akan stay tempat paparan yg sama
        //atau pilih bawah ni salah satu
       //utk arahan ni dia pergi ke page lain
       // return to_route('complaint.index')->with('success', 'Record updated succesfully. apa nak diletak mesej');
        
        //4. utk validate kena langgil fungsi request

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
