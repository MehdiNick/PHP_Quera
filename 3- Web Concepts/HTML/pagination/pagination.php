<?php

function getPaginationButtons($total_items, $per_page, $current_page)
{
    $paginationButtons=[];
    $numberOfPages= ceil($total_items/$per_page);
    $firstPageToCurrentPage= $current_page-1;
    $CurrentPageToLastPage= $numberOfPages-$current_page;
    $nextPage=$current_page+1;
    $nextnextPage=$current_page+2;
    $prevPage=$current_page-1;
    $prevPrevPage=$current_page-2;
    $NextPageToLastPage= $numberOfPages-$nextPage;


    if($firstPageToCurrentPage>0)
        $paginationButtons[]=["text"=>"prev","number"=>"$prevPage"];
    $paginationButtons[]=["text"=>"1","number"=>"1"];
    if($prevPrevPage>2)
        $paginationButtons[]=["text"=>"..."];
     if($prevPrevPage>0 && $prevPrevPage!=1)
        $paginationButtons[]=["text"=>"$prevPrevPage","number"=>"$prevPrevPage"];
    if($prevPage>0 && $prevPage!=1)
        $paginationButtons[]=["text"=>"$prevPage","number"=>"$prevPage"];
    if($current_page!=1)
         $paginationButtons[]=["text"=>"$current_page","number"=>"$current_page"];
    if($NextPageToLastPage>0)
          $paginationButtons[]=["text"=>"$nextPage","number"=>"$nextPage"];
    if($NextPageToLastPage>1)
        $paginationButtons[]=["text"=>"$nextnextPage","number"=>"$nextnextPage"];
    if($NextPageToLastPage>2)
        $paginationButtons[]=["text"=>"..."];
     if($numberOfPages!=$nextPage && $numberOfPages!=$current_page){
        $paginationButtons[]=["text"=>"$numberOfPages","number"=>"$numberOfPages"];
    }
    if($CurrentPageToLastPage>0)
        $paginationButtons[]=["text"=>"next","number"=>"$nextPage"];

  return $paginationButtons;  
}

function renderPagination($pagination_template, $total_items, $per_page, $current_page, $base_url)
{
    $pages = getPaginationButtons($total_items, $per_page, $current_page);
    $html = '';
    foreach ($pages as $page) {
        $page['text'] = str_replace(['prev', 'next'], ['&laquo;', '&raquo;'], $page['text']);
        if (in_array($page['text'], ['&laquo;', '...', '&raquo;'])) {
            $html .= '<li class="page-item">
              <a class="page-link" href="' . (isset($page['number']) ? $base_url . $page['number'] : '#') . '">
                <span aria-hidden="true">' . $page['text'] . '</span>
              </a>
            </li>';
        } else {
            $html .= '<li class="page-item' . ($page['number'] == $current_page ? ' active' : '') . '"><a class="page-link" href="' . $base_url . $page['number'] . '">' . $page['number'] . '</a></li>';
        }
    }

    return str_replace('{{ @pages }}', $html, $pagination_template);
}
