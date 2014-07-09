<?php

namespace Xvolutions\AdminBundle\Helpers;

/**
 * Description of Render
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 * @date 27/06/2014
 */
class Render {

    /*
     * The current page
     */
    private $current_page = null;

    /*
     * The Total Pages
     */
    private $total_pages = null;

    /*
     * The list of pages
     */
    private $list = null;

    /*
     * Class constructor
     */
    public function __construct($current_page, $total_pages, $list) {
        $this->current_page = $current_page;
        $this->total_pages = $total_pages;
        $this->list = $list;
    }

    /*
     * Function responsible to render the page numbers
     */
    public function view() {
        $pages = explode(' ', $this->list);

        if ($this->current_page < 1 || $this->current_page > $this->total_pages) {
            $this->current_page = 1;
        }
        $output = null;

        $output .= '<ul class="pagination">';
        $output .= $this->beginning();
        $output .= $this->middle($pages);
        $output .= $this->ending();
        $output .= '</ul>';
        
        return $output;
    }

    /*
     * Function responsible to render the beginning of the list, in this case <<
     */
    private function beginning() {
        if ($this->current_page - 1 >= 1) {
            return '<li><a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($this->current_page - 1) . '">«</a></li>';
        } else {
            return '<li class="disabled"><a href="#">«</a></li>';
        }
    }

    /*
     * Function responsible to render the middle of the list aka numbers
     */
    private function middle($pages) {
        $output = null;
        foreach ($pages as $page) {
            if ($page == $this->current_page) {
                $output .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                if ($page != '...') {
                    $output .= '<li><a href="' . $_SERVER['PHP_SELF'] . '?page=' . $page . '">' . $page . '</a></li>';
                } else {
                    $output .= '<li><a href="#">' . $page . '</a></li>';
                }
            }
        }
        return $output;
    }

    /*
     * Function responsible to render the ending of the list, in this case >>
     */
    private function ending() {
        if ($this->current_page + 1 <= $this->total_pages) {
            return '<li><a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($this->current_page + 1) . '">»</a></li>';
        } else {
            return '<li class="disabled"><a href="#">»</a></li>';
        }
    }

}
