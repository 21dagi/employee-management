<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
 public function dash(){
 
    return response()
    ->view('admin.dashboard') // Replace with your actual view
    ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
    ->header('Pragma', 'no-cache')
    ->header('Expires', 'Fri, Jan 01 1990 00:00:00 GMT');
 }
}
