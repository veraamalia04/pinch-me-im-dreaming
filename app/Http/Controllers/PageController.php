<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products= Product::with('prices')->get();
        return view('welcome', compact('products'));

    }

    public function menuPage(){
        $products= Product::with('prices')->get();
        return view('menu', compact('products'));
    }

    public function dashboardPage() {
        return view('dashboard.index');
    }

    public function cashierIndexPage() {
       
        return view('dashboard.cashier.index');
    }
    public function stockerIndexPage() {
        $products = Product::with('prices')->get();
        return view('dashboard.stocker.index', compact('products'));
    }
    public function ownerIndexPage() {
        return view('dashboard.owner.index');
    }

    public function editProductPage(Product $product){
        $product->load('prices');

        return view('dashboard.stocker.edit', compact('product'));
    }

    public function createProductPage() {
        return view('dashboard.stocker.create');
    }

    public function boxPage(){
        return view('box.index');
    }

    public function orderPage(){
        return view('order.index');
    }
}
