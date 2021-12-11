<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::paginate(20);

        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'create';

        $categories = PortfolioCategory::all();

        return view('admin.portfolio.form', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->category_id = $request->category_id;
        if ($request->img != null) {

            $imageName = asset("uploads/" . time() . '.' . $request->img->extension());

            $request->img->move(public_path('uploads/'), $imageName);
            $portfolio->img = $imageName;
        }
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('message', 'Successfully added');
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

        $categories = PortfolioCategory::all();

        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.form', compact('page', 'categories', 'portfolio'));
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
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->category_id = $request->category_id;
        if ($request->img != null) {

            $imageName = asset("uploads/" . time() . '.' . $request->img->extension());

            $request->img->move(public_path('uploads/'), $imageName);
            $portfolio->img = $imageName;
        }
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('message', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('message', 'Successfully deleted');
    }
}
