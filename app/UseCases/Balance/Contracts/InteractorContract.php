<?php

namespace App\UseCases\Balance\Contracts;

class InteractorContract
{
    public int $accountId;
    public bool $accountExists;
    public int $balance;

    public function __construct(int $accountId, bool $accountExists)
    {
        $this->accountId = $accountId;
        $this->accountExists = $accountExists;
    }
}
