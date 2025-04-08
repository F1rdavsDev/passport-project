<?php

namespace App\Http\Controllers;

use App\Models\Passport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PassportStoreRequest;
use App\Http\Requests\PassportCreateRequest;
use App\Http\Requests\PassportUpdateRequest;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
             $passport = Auth::user()->passport; 
        // dd($passport);
        // boldimi shumi

        //ha boldi 


        return view("passport.index",compact("passport"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     return view('passport.create');   
    }

    /**
     * 
     * 
     * Store a newly created resource in storage.
     */
    public function store(PassportStoreRequest $request)
    {
        $passport = Passport::create([
            'passport_number' => $request->passport_number,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            'user_id' => Auth::id(), 
        ]);
        // dd($passport,Auth::user());
        return redirect()->route('passport.index' , compact('passport'));
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $passport = Auth::user()->passport  ; 

        // return view('passport_crud.passport', compact('passport'));
       

    $passport = Passport::where('user_id', auth()->id())->findOrFail($id);
    return view('passport.passport', compact('passport'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $passport = Passport::findOrFail($id);

    if (Auth::id() !== $passport->user_id) {
        return redirect()->route('passport.index');
    }

    return view('passport.edit', compact('passport'));
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(PassportUpdateRequest $request, string $id)
    {

        $passport = Passport::findOrFail($id);  

    if (Auth::id() !== $passport->user_id) {
        return redirect()->route('passport.index');
    }

    $passport->update([
        'passport_number' => $request->passport_number,
        'issue_date' => $request->issue_date,
        'expiry_date' => $request->expiry_date,
    ]);


        return redirect()->route('passport.index');
    }

    /**
     * Remove the specified resource from storage.
     */
//     public function destroy(Passport $passport , string $id)
// {
//     // $passport = Passport::where('user_id', auth()->id())->findOrFail($id);
//     // if (Auth::id() !== $passport->user_id) {
//     //     return redirect()->route('passport.index');
//     // }

//     // $passport->delete();

//     // return redirect()->route('passport.index');
// }
public function destroy(string $id)
{
    $passport = Passport::where('user_id', auth()->id())->findOrFail($id);
    $passport->delete();

    return redirect()->route('passport.index');
}


    
}