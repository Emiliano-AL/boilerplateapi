<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Inventory;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all();

        return response()->json([
            'error' => false,
            'inventories'  => $inventories,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventory = Inventory::create($request->all());

        return response()->json([
            'error' => false,
            'inventory'  => $inventory,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        
        return response()->json([
            'error' => false,
            'inventory'  => $inventory,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);

        $inventory->item = $request->input('item');
        $inventory->description = $request->input('description');
        $inventory->quantity_at_hand = $request->input('quantity_at_hand');
        $inventory->price = $request->input('price');

        $inventory->save();
        
        return response()->json([
            'error' => false,
            'inventory'  => $inventory,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        return response()->json([
            'error' => false,
            'message'  => "The Inventory with the id $inventory->id has successfully been deleted.",
        ], 200);
    }
}
