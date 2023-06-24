<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Commission;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommissionsController extends Controller
{
    public function calculateCommission(Request $request)
    {
        $date = $request->input('date');

        // Retrieve all sellers
        $sellers = User::where('role', 'seller')->get();
    
        // Initialize total deducted amount
        $totalDeductedAmount = 0;
    
        // Calculate total amount and deducted amount for each seller
        foreach ($sellers as $seller) {
            // Check if a commission entry already exists for the selected date and seller
            $existingCommission = Commission::where('seller_id', $seller->id)
                ->where('date', $date)
                ->first();
    
            if ($existingCommission) {
                // If an entry already exists, skip the insertion
                $totalAmount = $existingCommission->total_amount;
                $deductedAmount = $existingCommission->deducted_amount;
            } else {
                $totalAmount = OrderItems::where('created_at', '>=', $date)
                    ->where('seller_id', $seller->id)
                    ->sum('price');
    
                $deductedAmount = $totalAmount * 0.02;
    
                // Insert commission data into the commissions table
                Commission::create([
                    'seller_id' => $seller->id,
                    'date' => $date,
                    'total_amount' => $totalAmount,
                    'deducted_amount' => $deductedAmount,
                ]);
            }
    
            $totalDeductedAmount += $deductedAmount;
        }
        // dd($sellers, $totalDeductedAmount);
    
        // Return the commission details view with the necessary data
        return view('backend.comission.commission-details', compact('sellers', 'totalDeductedAmount','date'));
   }
}
