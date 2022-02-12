<?php

namespace Tests\Fixtures;

trait HasDefaultConfig
{
    /**
     * @return array<array-key, string>
     */
    protected function getDefaultConfig(): array
    {
        return [
            'client-id',
            'client-secret',
            'dev-token',
        ];
    }
}
