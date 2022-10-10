<?php

namespace App\UseCases\Withdraw\Contracts;

class InteractorContract
{
    public int $accountId;

    /**
     * @var int|NULL
     */
    public $balance;

    /**
     * @param int|NULL $balance
     */
    public function __construct(
        int $accountId,
        $balance
    )
    {
        $this->accountId = $accountId;
        $this->balance = $balance;
    }
}
