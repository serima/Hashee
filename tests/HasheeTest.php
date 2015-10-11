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

        $expected = array(
            1 => true,
            2 => true,
            3 => true,
            4 => true,
        );
        $this->assertEquals($expected, $bannedUserIds);
        $this->assertTrue(Hashee::in(1, $bannedUserIds));
        $this->assertFalse(Hashee::in(5, $bannedUserIds));
    }

    public function test_delete()
    {
        $bannedUserIds = array();
        Hashee::add($bannedUserIds, 1);
        Hashee::delete($bannedUserIds, 1);

        $expected = array();
        $this->assertEquals($expected, $bannedUserIds);
        $this->assertFalse(Hashee::in(1, $bannedUserIds));
    }

    public function test_addBulk()
    {
        $bannedUserIds = array(1, 2, 3, 4, 5, 6);
        Hashee::addBulk($bannedUserIds);

        $expected = array(
            1 => true,
            2 => true,
            3 => true,
            4 => true,
            5 => true,
            6 => true,
        );
        $this->assertEquals($expected, $bannedUserIds);
        $this->assertTrue(Hashee::in(6, $bannedUserIds));
        $this->assertFalse(Hashee::in(7, $bannedUserIds));
    }

    public function test_deleteBulk()
    {
        $bannedUserIds = array(1, 2, 3, 4, 5);
        Hashee::addBulk($bannedUserIds);

        $deleteUserIds = array(1, 3);
        Hashee::deleteBulk($bannedUserIds, $deleteUserIds);
        $expected = array(
            2 => true,
            4 => true,
            5 => true,
        );
        $this->assertEquals($expected, $bannedUserIds);
    }

    public function test_release()
    {
        $bannedUserIds = array(1, 2, 3, 4, 5);
        Hashee::addBulk($bannedUserIds);
        Hashee::release($bannedUserIds);

        $this->assertEmpty($bannedUserIds);

    }
}