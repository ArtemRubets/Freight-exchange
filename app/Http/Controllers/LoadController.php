<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoadFormRequest;
use App\Models\Load;

class LoadController extends Controller
{
    public function createLoad(LoadFormRequest $request)
    {
        $loadData = $request->validated();

        $load = new Load();
        $createdData = $load->createLoad($loadData);

        if ($createdData){
            return redirect()->back()->with('message', 'Вантаж доданий')->with('status', true);
        }
        return redirect()->back()->with('message', 'Помилка занесення в базу даних')->with('status', false);
    }
}
