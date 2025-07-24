<?php

namespace App\DTOs;

use App\Contracts\ApplicantDataInterface;

class ApplicantDTO implements ApplicantDataInterface
{   
    /**
     * Create a new class instance.
     */
     public function __construct(
        protected string $name,
        protected string $bvn,
        protected int $duration,
        protected float $amount
    ) {}


    Public function name(): string
    {
        return $this->name;
    }

    public function bvn(): string
    {
        return $this->bvn;
    }

    public function duration(): int
    {
        return $this->duration;
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'amount' => $this->amount,
            'tenure' => $this->duration,
            'bvn' => $this->bvn,
        ];
    }
}