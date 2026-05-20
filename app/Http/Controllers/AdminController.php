<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $reports = Report::all();
        $statuses = Status::all();
        return back()->with('success', 'Статус заявления обновлён.');
    }
}