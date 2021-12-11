<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;

class Pricingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricings = Pricing::paginate(20);

        return view('admin.pricing.index', compact('pricings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'create';

        return view('admin.pricing.form', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pricing = new Pricing();
        $pricing->type = $request->type;
        $pricing->price = $request->price;
        $pricing->about = $request->about;
        $pricing->save();

        return redirect()->route('pricing.index')->with('message', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = 'update';

        $pricing = Pricing::findOrFail($id);

        return view('admin.pricing.form', compact('page', 'pricing'));
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
        $pricing = Pricing::findOrFail($id);
        $pricing->type = $request->type;
        $pricing->price = $request->price;
        $pricing->about = $request->about;
        $pricing->save();

        return redirect()->route('pricing.index')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pricing = Pricing::findOrFail($id);

        $pricing->delete();

        return redirect()->route('pricing.index')->with('message', 'Successfully deleted');
    }
}
