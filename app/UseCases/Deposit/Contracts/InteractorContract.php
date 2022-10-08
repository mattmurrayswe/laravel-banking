<?php

namespace App\UseCases\Deposit\Contracts;

class InteractorContract
{
    public int $accountId;
    public int $balance;

    public function __construct(
        int $accountId,
        int $balance
    )
    {
        $this->accountId = $accountId;
        $this->balance = $balance;
    }
}
