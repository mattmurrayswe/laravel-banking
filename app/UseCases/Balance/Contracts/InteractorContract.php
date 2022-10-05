<?php

namespace App\UseCases\Balance\Contracts;

class InteractorContract
{
    public bool $accountExists;

    public function __construct(bool $accountExists)
    {
        $this->accountExists = $accountExists;
    }
}
