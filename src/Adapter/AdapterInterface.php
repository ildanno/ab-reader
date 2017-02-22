<?php

namespace Antbank\AccountBalanceReader\Adapter;

interface AdapterInterface
{
    /**
     * Read a file and returns text content
     *
     * @param string $file File path to read
     * @return string File content
     */
    public function read(string $file): string;
}
