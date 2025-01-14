<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
  public function dashboard() {
    return view('admin.dashboard');
  }
}
