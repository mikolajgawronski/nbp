<?php

namespace App\Http\Interfaces;

interface NbpClientInterface
{
    public function sendGet(string $endpoint, array $query = []): ?array;
}
