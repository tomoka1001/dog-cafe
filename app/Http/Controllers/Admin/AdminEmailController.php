<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Http;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminemailController extends Controller
{
    public function index()
    {
        $emails = Email::all();
        return view('admin.emails.index', compact('emails'));
    }

    public function show(string $id)
    {
        $email = Email::findOrFail($id);
        return view('admin.emails.show', compact('email'));
    }


}
