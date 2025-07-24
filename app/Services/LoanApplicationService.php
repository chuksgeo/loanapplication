<?php

namespace App\Services;

use App\Contracts\PartnerApplicationInterface;

class LoanApplicationService
{
    /**
     * Process the loan application data.
     *
     * @param array $data
     * @return array
     */
    public function __construct(protected PartnerApplicationInterface $partnerApplication) 
    {}

    public function handle(array $payload): array
    {
        $data = $this->partnerApplication->validate($payload);
        return $data;
    }


    // public function saveLoanApplication(array $data): bool
    // {
    //     // Logic to save the loan application data
    //     // This could involve saving to a database or an external service
    //     // For now, we will just return true to indicate success
    //     return true;
    // }
}