<?php

namespace App\UseCases\Transfer\Contracts;

class InputContract
{
    public int $origin;
    public int $amount;
    public int $destination;

    public function __construct(
        int $origin,
        int $amount,
        int $destination
    )
    {
        $this->origin = $origin;
        $this->amount = $amount;
        $this->destination = $destination;
    }
}
