<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $orders = Order::with(['details.product', 'user'])->orderBy('created_at', 'DESC')->get();
        $todayOrders = Order::with(['details.product', 'user'])->today()->get();
        $todayEarnings = Order::today()->whereNotNull('pemrosesan_pada')->whereNotNull('pengiriman_pada')
            ->get()->sum('total_harga');
        
        $todayCustomers = Order::today()->distinct('user_id')->count();
        return view('dashboard.cashier.index', compact('orders', 'todayOrders', 'todayEarnings', 'todayCustomers'));
    }
    public function stockerIndexPage() {
        $products = Product::with('prices')->get();
        return view('dashboard.stocker.index', compact('products'));
    }
    public function ownerIndexPage(Request $request) {
        $filter = $request->input('filter', 'semua');

        $ordersDone = Order::selesai()
            ->when($filter === 'harian', function ($query) {
                $query->whereDate('pemesanan_pada', today());
            })
            ->when($filter === 'mingguan', function ($query) {
                $query->whereBetween('pemesanan_pada', [
                    now()->startOfWeek(),
                    now()->endOfWeek(),
                ]);
            })
            ->when($filter === 'bulanan', function ($query) {
                $query->whereMonth('pemesanan_pada', now()->month)
                    ->whereYear('pemesanan_pada', now()->year);
            })
            ->get();

            $totalHargaPenjualan = $ordersDone->sum('totalHarga');
            $totalProdukTerjual = $ordersDone->count();
            $totalPembeliUnik = $ordersDone->pluck('user_id')->unique()->count();
        return view('dashboard.owner.index', compact('filter', 'ordersDone', 'totalHargaPenjualan', 'totalProdukTerjual', 'totalPembeliUnik'));
    }

    public function editProductPage(Product $product){
        $product->load('prices');

        return view('dashboard.stocker.edit', compact('product'));
    }

    public function createProductPage() {
        return view('dashboard.stocker.create');
    }

    public function boxPage(){
        $userLoggedId = Auth::id();
        $user = User::with('box.details')->where('id', $userLoggedId)->first();

        $boxDetails = $user->box->details ?? [];
        $box = $user->box ?? [];

        return view('box.index', compact('boxDetails', 'box'));
    }

    public function orderPage(){
        $userLoggedId = Auth::id();

        $user = User::with('orders.details.product')->where('id', $userLoggedId)->first();
        $orders = $user->orders ?? [];
        return view('order.index', compact('orders'));
    }

    public function orderDetailPage(Order $order){
        $order->load('details.product');
         return view('order.show', compact('order'));
    }

    public function pageCreateAddress(User $user){
        if($user->addresses) return redirect()->route('index');
        if(Auth::user()->username !== $user->username) return redirect()->route('page.address.create', Auth::user()->username);
        return view('create-alamat', compact('user'));
    }

    public function pageEditAddress(Address $address){
        
        return view('edit-alamat', compact('address'));
    }
}
