<?php

namespace App\Contracts;


interface ApplicantDataInterface
{
    public function name(): string;
    public function bvn(): string;
    public function duration(): int;
    public function amount(): float;
}
