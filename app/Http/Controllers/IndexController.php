<?php

namespace App\Http\Controllers;

use App\Models\Load;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function index()
    {
        $loads = Load::with('point')->get(['id', 'name', 'weight', 'created_at']);

        if (View::exists('index')){
            return \view('index', compact('loads'));
        }
        abort(404);
    }
}
