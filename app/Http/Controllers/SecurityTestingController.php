<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityTestingController extends Controller
{
    public function index()
    {
        return view('security-testing.index');
    }

    public function xss()
    {
        return view('security-testing.xss');
    }

    public function csrf()
    {
        return view('security-testing.csrf');
    }

    public function headers()
    {
        return view('security-testing.headers');
    }

    public function audit()
    {
        return view('security-testing.audit');
    }
}
