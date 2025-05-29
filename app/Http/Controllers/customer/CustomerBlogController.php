<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class CustomerBlogController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return view('customer.blogs.index', compact('blogs'));
    }
}
