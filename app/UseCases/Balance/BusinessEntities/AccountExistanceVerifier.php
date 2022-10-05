<?php

namespace App\UseCases\Balance\BusinessEntities;

class AccountExistanceVerifier
{
    public bool $exists = true;

    public function __construct(int $accountId)
    {
        if ($accountId === 1234)
        {
            $this->exists = false;
        }
    }
}
