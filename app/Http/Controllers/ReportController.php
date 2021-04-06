<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
class ReportController extends Controller
{


    public function index()
    {
        $data['report'] = Report::all()->where("silindiMi", 1);
        return view("report" , $data);
    }
}
