<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\Payment;
use Illuminate\Http\Request;

class MenuItemSalesController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Menu Item Sales';
        
        $search = $request->input('search', null);

        if ($search) {
            $menuItems = MenuItem::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
                ->get();
        } else {
            $menuItems = MenuItem::all();
        }

        $totalSales = Payment::all()->sum('amount');

        return view('admin.reports.menu-item-sales', compact('title', 'menuItems', 'search', 'totalSales'));
    }
}