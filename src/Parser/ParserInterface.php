<?php

namespace Antbank\AccountBalanceReader\Parser;

interface ParserInterface
{
    public function parse(string $input): array;
}