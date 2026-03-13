<?php

namespace NumPHP\Types;

use NumPHP\Core\DType;

class CanCast
{
    /**
     * Returns True if an array of dtype from can be safely cast to dtype to according to the casting rule.
     *
     * @param string $from
     * @param string $to
     * @return bool
     */
    public static function can_cast(string $from, string $to): bool
    {
        return DType::canCast($from, $to);
    }
}