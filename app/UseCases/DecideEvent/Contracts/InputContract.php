<?php

namespace App\UseCases\DecideEvent\Contracts;

class InputContract
{
    public string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }
}
