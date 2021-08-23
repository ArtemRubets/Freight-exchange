<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoadFormRequest;
use App\Http\Resources\LoadResource;
use App\Models\Load;

class LoadController extends Controller
{
    public function getLoads()
    {
        return LoadResource::collection(Load::get(['id', 'name', 'weight', 'created_at']));
    }

    public function createLoad(LoadFormRequest $request)
    {
        $loadData = $request->validated();

        $load = new Load();
        $createdData = $load->createLoad($loadData);

        return new LoadResource($createdData);
    }
}
