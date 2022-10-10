<?php

namespace App\UseCases\Withdraw\Contracts;

class InputContract
{
    public int $origin;
    public int $amount;

    public function __construct(
        int $origin,
        int $amount
    )
    {
        $this->origin = $origin;
        $this->amount = $amount;
    }
}
