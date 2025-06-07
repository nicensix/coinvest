<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;

class InvestmentController extends Controller
{
    // Fetch all investments
    public function index()
    {
        return response()->json(Investment::all(), 200);
    }

    // Create a new investment
    public function store(Request $request)
    {
        $investment = Investment::create($request->validate([
            'user_id' => 'required|exists:users,id',
            'wallet_id' => 'required|exists:wallets,id',
            'investment_type' => 'required|string',
            'amount' => 'required|numeric|min:1',
            'status' => 'required|in:active,closed',
        ]));

        return response()->json($investment, 201);
    }

    // Get a specific investment by ID
    public function show($id)
    {
        return response()->json(Investment::findOrFail($id), 200);
    }

    // Update an existing investment
    public function update(Request $request, $id)
    {
        $investment = Investment::findOrFail($id);
        $investment->update($request->all());

        return response()->json($investment, 200);
    }

    // Delete an investment
    public function destroy($id)
    {
        Investment::destroy($id);
        return response()->json(['message' => 'Investment deleted'], 200);
    }
}
