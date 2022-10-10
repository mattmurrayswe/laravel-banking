<?php

namespace App\UseCases\CreateAccount\BusinessEntities;

class AccountCreator
{
    public function __construct(int $accountId, int $initialBalance)
    {
        file_put_contents("{$accountId}.txt", $initialBalance);
    }
}
