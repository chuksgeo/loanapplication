<?php

namespace App\Http\Controllers;

use App\Contracts\PartnerApplicationInterface;
use App\Http\Requests\LoanApplicationFormRequest;
use App\Services\LoanApplicationService;
use Illuminate\Http\Request;

class LoanApplicationController extends Controller
{

    public function __construct(public PartnerApplicationInterface $loanApplication)
    {
        // You can inject services or dependencies here if needed
    }
    

    public function store(LoanApplicationFormRequest $request)
    {
        $payload = $request->validated();
        $loan = $this->loanApplication->validate($payload);
        

        // Example: Save the application to the database
        // LoanApplication::create($request->validated());

        return response()->json(['message' => 'Loan application submitted successfully.']);
    }
}