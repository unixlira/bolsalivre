<?php

namespace App\Http\Controllers\Backend;

use App\User;
use App\Order;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Institution;
use Illuminate\Support\Facades\Request;
use App\Exports\OrdersExport;
use App\Exports\InstitutionsExport;
use App\Category;
use App\Subcategory;
use App\Shift;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        $institutions = Institution::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $shifts = Shift::all();
        $users = User::all();
        $orders = Order::all();
        return view('backend.reports.index', compact('institutions', 'users', 'categories', 'subcategories', 'shifts'));
    }

    public function ordersExport(Request $request)
    {
        return Excel::download(new OrdersExport($request::all()), 'relatorio.xlsx');
    }

    public function institutionsExport(Request $request)
    {
        return Excel::download(new InstitutionsExport($request::all()), 'relatorioInstituicoes.xlsx');
    }
}
