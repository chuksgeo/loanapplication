<?php

namespace App\Contracts;

interface PartnerApplicationInterface
{
    public function validate(array $payload): array;
}
