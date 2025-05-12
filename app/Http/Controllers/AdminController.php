<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function openDashboard() {
        return(view("admin/dashboard"));
    }
}
