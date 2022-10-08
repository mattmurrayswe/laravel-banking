<?php

namespace App\UseCases\Deposit\Contracts;

class InputContract
{
    public int $destination;
    public int $amount;

    public function __construct(
        int $destination,
        int $amount
    )
    {
        $this->destination = $destination;
        $this->amount = $amount;
    }
}
