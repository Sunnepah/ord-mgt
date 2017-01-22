<?php

require_once(__DIR__ . "/../TestCase.php");

use Application\Libraries\Utils\OrderUtils;

class OrderUtilsTest extends TestCase
{
    public function test_calculateOrderPrice() {
        $this->assertEquals(12, OrderUtils::calculateOrderPrice(2, 6));
    }
}