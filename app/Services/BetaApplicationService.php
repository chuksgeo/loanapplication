<?php

namespace App\Services;

use App\Contracts\PartnerApplicationInterface;
use App\DTOs\ApplicantDTO;
 

class BetaApplicationService implements PartnerApplicationInterface
{
    public function __construct()
    {
        //
    }
    
    public function validate(array $payload): array
    {
        $data = new ApplicantDTO(
            $payload['applicant']['fullName'],
            $payload['applicant']['bvn'],
            $payload['loanDetails']['duration'],
            $payload['loanDetails']['amountRequested'],
        );

        return $data->toArray();
    }
}
