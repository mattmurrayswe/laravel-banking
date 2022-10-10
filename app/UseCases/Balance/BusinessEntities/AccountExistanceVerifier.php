<?php

namespace App\UseCases\Balance\BusinessEntities;

class AccountExistanceVerifier
{
    public bool $exists = false;

    public function __construct(int $accountId)
    {
        if (file_get_contents("{$accountId}.txt") !== 'NULL') {

            $this->exists = true;

        }
    }
}
