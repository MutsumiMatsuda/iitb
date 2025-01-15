<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Plan;

class TopController extends Controller
{
    public function index() {
      $plans = Plan::getAllValid();
      $notice = Notice::find(1);
      return view('top', compact(['notice', 'plans']));
    }
}
