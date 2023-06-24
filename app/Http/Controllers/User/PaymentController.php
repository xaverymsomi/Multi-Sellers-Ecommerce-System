<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generateControlNumber()
    {
        $controlNumber = '19112000';

        // Generate a control number of length 6
        for ($i = 0; $i < 7; $i++) {
            $controlNumber .= rand(0, 9);
        }

        return view('frontend.payment.generate-control-number', compact('controlNumber'));
    }

    
}
