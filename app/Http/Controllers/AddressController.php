<?php

namespace App\Http\Controllers;


use App\Http\Requests\Address\CreateRequest;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function createAddress(User $user, CreateRequest $request){
        $data = $request->validated();

        $address = $user->addresses()->create([
            'rt' = $data['rt'],
            'rw' = $data['rw'],
            'kota' = $data['kota'],
            'kecamatan' = $data['kecamatan'],
            'kelurahan' = $data['kelurahan'],
            'alamat' = $data['alamat'],
            'kode_pos' = $data['kode_pos'],

            'is_active' => true,
        ]);

        return redirect()->route('page.home')->with('success', 'Selamat datang ' . config('app.name'));

    }

    public function deleteAddress(User $user, Address $address){
        $addressesCount = $user->addresses->count();

        if($addressesCount <= 1) return back()->with('error', 'Tidak bisa menghapus alamat');

        $address->delete();

        return back()->with('success', 'Berhasil menghapus alamat');
    }

    public function updateAddress(Address $address, CreateRequest $request){
        $data = $request->validated();

        $address = $address->update([
            'rt' = $data['rt'],
            'rw' = $data['rw'],
            'kota' = $data['kota'],
            'kecamatan' = $data['kecamatan'],
            'kelurahan' = $data['kelurahan'],
            'alamat' = $data['alamat'],
            'kode_pos' = $data['kode_pos'],

            'is_active' => true,

            ]);

            return back()->with('success', 'Berhasil mengganti alamat');
    }

    public function changeActiveAdress(Address $address){
        $activeAddresses = Address::where('is_active', true)->update(['is_active' => false]);

        $address->update(['is_active' =>true]);

        return back()->with('success', 'Mengganti alamat aktif');
    }
}
