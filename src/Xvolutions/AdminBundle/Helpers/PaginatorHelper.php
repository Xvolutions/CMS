<?php

namespace Xvolutions\AdminBundle\Helpers;

use Xvolutions\AdminBundle\Helpers\Pagination;
use Xvolutions\AdminBundle\Helpers\Render;

/**
 * Description of paginatorHelper
 *
 * @author Pedro Resende <pedroresende@mail.resende.biz>
 * @date 12/08/2014
 */
class PaginatorHelper
{
    private $render;
    
    /**
     * This function is reponsible to help the building of the paginator
     * 
     * @param type $total Total number of pages
     * @param type $elementsPerPage Number of elements per page
     * @param type $current_page The current page
     * @param integer $boundaries 
     * @param integer $around
     * @return type The list of pages
     */
    public function __construct($total, $elementsPerPage, $current_page, $boundaries, $around)
    {
        $total_pages = ceil($total[0][1] / $elementsPerPage);

        $page = new Pagination($current_page, $total_pages, $boundaries, $around);
        $list = $page->displayPagination();

        $render = new Render($current_page, $total_pages, $list);
        $this->render = $render->view();
    }

    public function __toString()
    {
        return $this->render;
    }
}
