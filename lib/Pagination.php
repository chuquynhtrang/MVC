<?php
class Pagination
{
    private $totalRecord;
    private $recordPerPage;
    private $currentPage;
    private $totalPage;


    public function __construct($totalRecord, $recordPerPage, $currentPage)
    {
        $this->totalRecord = $totalRecord;
        $this->currentPage = $currentPage;
        $this->recordPerPage = $recordPerPage;
        $this->totalPage = ceil($totalRecord / $recordPerPage);
    }

    public function getOffset()
    {
        $offset = $this->recordPerPage * ($this->currentPage - 1);
        return $offset;
    }

    public function paginationPanel($href)
    {
        $nextHTML = '';
        $lastHTML = '';
        $firstHTML = '';
        $preHTML = '';
        $nextNumHTML = '';
        $nextNum2HTML = '';
        $preNumHTML = '';
        $preNum2HTML = '';
        $next = $this->currentPage + 1;
        $pre = $this->currentPage - 1;
        $pre_1 = $this->currentPage - 2;
        $next_1 = $this->currentPage + 2;
        $class_disabled = 'paginate_button paginate_button_disabled';
        $class_abled = 'paginate_button paginate_button';
        $current = "<a class='paginate_active' href='{$href}{$this->currentPage}'>{$this->currentPage}</a>";
        if($this->totalPage <= 3){
            $firstHTML = "<a class='$class_disabled' href=''>First</a>";
            $preHTML = "<a class='$class_disabled' href=''>Previous</a>";
            $nextHTML = "<a class='$class_disabled' href=''>Next</a>";
            $lastHTML = "<a class='$class_disabled' href=''>Last</a>";
            if($this->totalPage == 0)
                $current = '';
            if($this->totalPage == 2) {
                if ($this->currentPage == 1)
                    $nextNumHTML = "<a class='$class_abled' href='{$href}{$next}'>$next</a>";
                else
                    $preNumHTML = "<a class='$class_abled' href='{$href}{$pre}'>$pre</a>";
            }
            if($this->totalPage == 3){
                if($this->currentPage==1) {
                    $nextNumHTML = "<a class='$class_abled' href='{$href}{$next}'>$next</a>";
                    $nextNum2HTML = "<a class ='$class_abled' href='{$href}{$next_1}'>$next_1</a>";
                }
                else if($this->currentPage==2) {
                    $preNumHTML = "<a class='$class_abled' href='{$href}{$pre}'>$pre</a>";
                    $nextNumHTML = "<a class ='$class_abled' href='{$href}{$next}'>$next</a>";
                }else {
                    $preNum2HTML = "<a class='$class_abled' href='{$href}{$pre_1}'>$pre_1</a>";
                    $preNumHTML = "<a class='$class_abled' href='{$href}{$pre}'>$pre</a>";
                }
            }

        } else {
            if($this->currentPage < $this->totalPage){
                if($this->currentPage == 1){
                    $firstHTML = "<a class='$class_disabled' href='{$href}1'>First</a>";
                    $preHTML = "<a class='$class_disabled' href='{$href}{$pre}'>Previous</a>";
                    $nextNumHTML = "<a class='$class_abled' href='{$href}{$next}'>$next</a>";
                    $nextNum2HTML = "<a class='$class_abled' href='{$href}{$next_1}'>$next_1</a>";
                    $nextHTML = "<a class='$class_abled' href='{$href}{$next}'>Next</a>";
                    $lastHTML = "<a class='$class_abled' href='{$href}{$this->totalPage}'>Last</a>";
                } else {
                    $firstHTML = "<a class='$class_abled' href='{$href}1'>First</a>";
                    $preHTML = "<a class='$class_abled' href='{$href}{$pre}'>Previous</a>";
                    $preNumHTML = "<a class='$class_abled' href='{$href}{$pre}'>$pre</a>";
                    $nextNumHTML = "<a class='$class_abled' href='{$href}{$next}'>$next</a>";
                    $nextHTML = "<a class='$class_abled' href='{$href}{$next}'>Next</a>";
                    $lastHTML = "<a class='$class_abled' href='{$href}{$this->totalPage}'>Last</a>";
                }
            } else {
                $firstHTML = "<a class='$class_abled' href='{$href}1'>First</a>";
                $preHTML = "<a class='$class_abled' href='{$href}{$pre}'>Previous</a>";
                $preNum2HTML = "<a class='$class_abled' href='{$href}{$pre_1}'>$pre_1</a>";
                $preNumHTML = "<a class='$class_abled' href='{$href}{$pre}'>$pre</a>";
                $nextHTML = "<a class='$class_disabled' href='{$href}{$next}'>Next</a>";
                $lastHTML = "<a class='$class_disabled' href='{$href}{$this->totalPage}'>Last</a>";
            }
        }
        $html = $firstHTML . $preHTML . $preNum2HTML.$preNumHTML. $current . $nextNumHTML . $nextNum2HTML. $nextHTML . $lastHTML;
        return $html;
    }
}