<?php

namespace App\Services;

use App\Contracts\PartnerApplicationInterface;
use App\DTOs\ApplicantDTO;

class AlphaApplicationService implements PartnerApplicationInterface
{
     public function __construct()
    {
        //
    }

    public function validate(array $payload): array
    {
        $data = new ApplicantDTO(
            $payload['customer_name'],
            $payload['bvn'],
            $payload['tenure_months'],
            $payload['amount'],
        );

        return $data->toArray();
    }
}