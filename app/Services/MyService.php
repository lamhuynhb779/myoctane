<?php

namespace App\Services;

class MyService
{
    public int $counter = 0;

    public function increment(): void
    {
        $this->counter++;
    }
}
