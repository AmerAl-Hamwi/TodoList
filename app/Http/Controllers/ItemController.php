<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponse;
use phpDocumentor\Reflection\Types\Null_;

class ItemController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->get();
        return $this->apiResponse($items, 200, 'OK');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $item = Item::create([
            'name' => $request->name,
        ]);
        return $this->apiResponse($item, 201, 'Created');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return $this->apiResponse(null, 404, 'Not Found');
        }
        $item->update([
            'name' => $request->name,
        ]);
        return $this->apiResponse($item, 200, 'OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return $this->apiResponse(null, 404, 'Not Found');
        }
        $item->delete();
        return $this->apiResponse(null, 200, 'OK');
    }
}
