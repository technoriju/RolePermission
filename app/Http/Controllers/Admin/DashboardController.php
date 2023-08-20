<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
     return view('admin.dashboard');
   }

   public function form()
   {
     return view('admin.form');
   }

   public function table()
   {
     return view('admin.table');
   }
}
