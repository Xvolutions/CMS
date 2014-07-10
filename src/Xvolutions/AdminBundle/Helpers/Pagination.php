<?php

namespace Xvolutions\AdminBundle\Helpers;

use Symfony\Component\Debug\ErrorHandler;

/**
 * Description of Pagination
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 * @date 22/06/2014
 * 
 */
class Pagination {
    /*
     * The current page
     */

    private $current_page = null;

    /*
     * The totla number of pages
     */
    private $total_pages = null;

    /*
     * The number of pages to show since page one and from the the last one
     */
    private $boundaries = null;

    /*
     * The number of pages to show around the current page
     */
    private $around = null;

    /*
     * The array of pages to be displayed
     */
    private $pages = null;

    /*
     * Class constructor
     */
    public function __construct($current_page, $total_pages, $boundaries, $around) {
        $this->current_page = $current_page;
        $this->total_pages = $total_pages;
        $this->boundaries = $boundaries;
        $this->around = $around;
    }

    /*
     * Function responsible to display the page numbers
     */
    public function displayPagination() {
        $this->validation();

        $this->bootstrapPages();
        $this->beginning();
        $this->current();
        $this->ending();

        $output = null;
        $previous = null;
        for ($i = 1; $i < $this->total_pages + 1; $i++) {
            if ($this->pages[$i - 1] == 1) {
                $output .= $i . ' ';
                $actual = 1;
            } else {
                if ($previous != 0) {
                    $output .= '... ';
                }
                $actual = 0;
            }
            $previous = $actual;
        }

        return substr($output, 0, strlen($output) - 1);
    }

    /*
     * Function responsible to fill the pages array with zeros (0)
     */

    private function bootstrapPages() {
        $this->pages = array_fill(0, $this->total_pages, 0);
    }

    /*
     * Function responsible to validate the variables
     */
    private function validation() {
        if (is_numeric($this->current_page) && is_numeric($this->total_pages) && is_numeric($this->boundaries) && is_numeric($this->around)) {
            if ($this->current_page < 1 || $this->current_page > $this->total_pages) {
                $this->current_page = 1;
            }
            if ( $this->total_pages < 1) {
                $this->total_pages = 1;
            }
        } else {
            throw new \ErrorException('InvalidArgumentException');
        }
    }

    /*
     * Function responsible to display the first page with the boundaries
     */
    private function beginning() {
        if ($this->boundaries > 1) {
            for ($i = 1; $i < $this->boundaries + 1; $i ++) {
                $this->pages[$i - 1] = 1;
            }
        } else {
            $this->pages[0] = 1;
        }
    }

    /*
     * Function reponsible to displau the current page with the arround ones
     */
    private function current() {
        if ($this->current_page - $this->around < 1) {
            $start = 1;
        } else {
            $start = $this->current_page - $this->around;
        }
        if ($this->current_page + $this->around > $this->total_pages + 1) {
            $end = $this->total_pages + 1;
        } else {
            $end = $this->current_page + $this->around + 1;
        }

        for ($i = $start; $i < $end; $i++) {
            $this->pages[$i - 1] = 1;
        }
    }

    /*
     * Function responsible to display the last page with boundaries
     */
    private function ending() {
        if ($this->boundaries > 1) {
            $first = $this->total_pages - $this->boundaries + 1;
            for ($i = $first; $i < $this->total_pages + 1; $i ++) {
                $this->pages[$i - 1] = 1;
            }
        } else {
            $this->pages[$this->total_pages - 1] = 1;
        }
    }

}
