<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $customers = Customer::all();
        return view('customers.list', compact('customers'));
    }

    protected function create()
    {
        return view('customers.create');
    }

    protected function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->dob = $request->input('dob');
        $customer->email = $request->input('email');
        $customer->save();

        Session::flash('success', 'Tạo mới khách hàng thành công');
        return redirect()->route('customers.list');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->dob = $request->input('dob');
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customers.list');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');

        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customers.list');
    }


}
