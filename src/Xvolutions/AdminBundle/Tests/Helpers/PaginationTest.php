<?php

namespace Xvolutions\AdminBundle\Tests\Helpers;

use Xvolutions\AdminBundle\Helpers\Pagination;

/**
 * Description of PaginationTest
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 */
class PaginationTest extends \PHPUnit_Framework_TestCase
{
    public function testDisplayPagination1()
    {
        $pagination = new Pagination(4, 5, 1, 0);
        $result = $pagination->displayPagination();

        $this->assertEquals('1 ... 4 5', $result);
    }

    public function testDisplayPagination2()
    {
        $pagination = new Pagination(4, 10, 2, 2);
        $result = $pagination->displayPagination();

        $this->assertEquals('1 2 3 4 5 6 ... 9 10', $result);
    }

    public function testDisplayPagination3()
    {
        $pagination = new Pagination(4, 100, 2, 2);
        $result = $pagination->displayPagination();

        $this->assertEquals('1 2 3 4 5 6 ... 99 100', $result);
    }

    public function testDisplayPagination4()
    {
        $pagination = new Pagination(-1, 100, 2, 4);
        $result = $pagination->displayPagination();

        $this->assertEquals('1 2 3 4 5 ... 99 100', $result);
    }

    public function testDisplayPagination5()
    {
        $pagination = new Pagination(100, 100, 2, 4);
        $result = $pagination->displayPagination();

        $this->assertEquals('1 2 ... 96 97 98 99 100', $result);
    }

    public function testDisplayPagination6()
    {
        $pagination = new Pagination(50, 100, 2, 4);
        $result = $pagination->displayPagination();
        
        $this->assertEquals('1 2 ... 46 47 48 49 50 51 52 53 54 ... 99 100', $result);
    }

    public function testDisplayPagination7()
    {
        $pagination = new Pagination(50, 100, 101, 101);
        $result = $pagination->displayPagination();
        
        $this->assertEquals('1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40 41 42 43 44 45 46 47 48 49 50 51 52 53 54 55 56 57 58 59 60 61 62 63 64 65 66 67 68 69 70 71 72 73 74 75 76 77 78 79 80 81 82 83 84 85 86 87 88 89 90 91 92 93 94 95 96 97 98 99 100', $result);
    }
}
