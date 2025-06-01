<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreEmailRequest;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class CustomerEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function complete()
    {
        return view('.customer.emails.complete');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmailRequest $request)
    {
        $email = Email::create([
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'phone' => $request->phone,
            'email' => $request->email,
            'body' => $request->body,
        ]);
        
        return redirect()->route('emails.complete'); // ← ここが重要！
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
    public function destroy(string $id)
    {
        //
    }
}
