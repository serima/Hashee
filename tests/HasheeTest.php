<?php
use Serima\Hashee\Hashee;

class HasheeTest extends PHPUnit_Framework_TestCase {

    public function test_add_in()
    {
        $bannedUserIds = array();
        Hashee::add($bannedUserIds, 1);
        Hashee::add($bannedUserIds, 2);
        Hashee::add($bannedUserIds, 3);
        Hashee::add($bannedUserIds, 4);

        $this->assertTrue(Hashee::in($bannedUserIds, 1));
        $this->assertFalse(Hashee::in($bannedUserIds, 5));
    }

    public function test_delete()
    {
        $bannedUserIds = array();
        Hashee::add($bannedUserIds, 1);
        Hashee::delete($bannedUserIds, 1);

        $this->assertFalse(Hashee::in($bannedUserIds, 1));
    }
}