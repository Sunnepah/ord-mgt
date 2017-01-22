<?php

namespace Application\Libraries\Utils;


class OrderUtils
{
    public static function calculateOrderPrice($quantity, $unitPrice) {
        return $quantity * $unitPrice;
    }

}