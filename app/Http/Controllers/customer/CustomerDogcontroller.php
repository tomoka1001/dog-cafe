<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dog;

class CustomerDogcontroller extends Controller
{
    public function index()
    {
        $dogs = Dog::all();
        // compact('dogs')は['dogs' => $dogs]と同じ
        return view('customer.dogs.index', compact('dogs'));
    }
}
