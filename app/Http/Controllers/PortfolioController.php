<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    // Display the list of portfolios
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('index', compact('portfolios'));
    }

    // Show the form for creating a new portfolio
    public function create()
    {
        // No need to pass $portfolio since we're creating a new one
        $portfolios = Portfolio::all();
        return view('settings', compact('portfolios'));
    }

    // Store a new portfolio
    public function store(Request $request)
    {
        // Validasi dan penyimpanan data
        $request->validate([
            'title' => 'required',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);
    
        Portfolio::create($request->all());
    
        return redirect()->route('settings')->with('success', 'Portfolio added successfully.');
    }
    

    // Show the form for editing an existing portfolio
    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolios = Portfolio::all();

        return view('settings', compact('portfolio', 'portfolios'));
    }

    // Update an existing portfolio
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // Validate the request data
        $request->validate([
            'title' => 'required',
            // Add other validation rules as needed
        ]);

        // Update the portfolio
        $portfolio->update($request->all());

        return redirect('/settings')->with('success', 'Portfolio updated successfully.');
    }

    // Delete a portfolio
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect('/settings')->with('success', 'Portfolio deleted successfully.');
    }
}
