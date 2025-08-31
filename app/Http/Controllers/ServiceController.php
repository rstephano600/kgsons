<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Models\FoodSale;
use App\Helpers\LogActivity;

class ServiceController extends Controller
{
public function index()
{
    $services = Service::with('user')->paginate(10);
    return view('system.pos.services.index', compact('services'));
}

public function create()
{
    $users = User::all(); // admin selects user
    return view('system.pos.services.create', compact('users'));
}

public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'service_name' => 'required|string|max:255',
    ]);

    $service = Service::create($request->all());

    LogActivity::add(
    'create',
    'Customer Server',
    $service->id,
    'Created a customer server: ' . $service->user->name
);
    return redirect()->route('customer_services.index')->with('success', 'Service assigned successfully.');
}

}
