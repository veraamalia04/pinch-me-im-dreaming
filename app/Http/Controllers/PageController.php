<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function loginPage() {
        return view('login');
    }

    public function registerPage() {
        return view('register');
    }

    public function index() {
        return view('welcome');
    }

    public function dashboardPage() {
        return view('dashboard.index');
    }

    public function cashierIndexPage() {
        return view('dashboard.cashier.index');
    }
    public function stockerIndexPage() {
        return view('dashboard.stocker.index');
    }
    public function ownerIndexPage() {
        return view('dashboard.owner.index');
    }
}
