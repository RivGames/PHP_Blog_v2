<?php
namespace fw\libs;
/**
 * @author Ihor Rud
 * Класс Pagination для пагинации на странице постов
 */
class Pagination
{
    public $currentPage;
    public $perpage;
    public $total;
    public $countPages;
    public $uri;
    
    public function __construct($page,$perpage,$total)
    {
        $this->perpage = $perpage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = $this->getParams();
    }
    public function __toString()
    {
        return $this->getHtml();
    }
    public function getHtml()
    {
        $back = null;//ссылка НАЗАД
        $forward = null;//ссылка ВПЕРЕД
        $startpage = null;//ссылка в НАЧАЛО
        $endpage = null;//ссылка в КОНЕЦ
        $page2left = null;//вторая страница слева
        $page1left = null;//первая страница слева
        $page2right = null;//вторая страница справа
        $page1right = null;//первая страница справа
        if($this->currentPage > 1){
            $back = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage - 1)."'>&lt</a></li>";
        }
        if($this->currentPage < $this->countPages){
            $forward = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage + 1)."'>&gt</a></li>";
        }
        if($this->currentPage > 3){
            $startpage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo</a></li>";
        }
        if($this->currentPage - 2){
            $endpage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo</a></li>";
        }
        if($this->currentPage - 2 > 0){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage - 2)."'>" .($this->currentPage - 2) ."</a></li>";
        }
        if($this->currentPage - 1 > 0){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage - 1)."'>" .($this->currentPage - 1) ."</a></li>";
        }
        if($this->currentPage + 2 > 0){
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage + 2)."'>" .($this->currentPage + 2) ."</a></li>";
        }
        if($this->currentPage + 1 > 0){
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=".($this->currentPage + 1)."'>" .($this->currentPage + 1) ."</a></li>";
        }
        return '<ul class="pagination">'.$startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage.'</ul>';
    }
    /**
     * getCountPages
     * Берём общее количество и делим на количество на 1 страницу
     * и округляем в большую сторону НО в противном случае присвой 1
     * @return void
     */
    public function getCountPages()
    {
        return ceil($this->total / $this->perpage) ? : 1;
    }
    /**
     * getCurrentPage
     * Получаем текущую страницу
     */
    public function getCurrentPage($page)
    {
        if(!$page or $page < 1)
            $page = 1;
        if($page > $this->countPages)
            $page = $this->countPages;
        return $page;
    }
    /**
     * getStart()
     * Отнимает от текущей страницы единичку и умножаем на 
     * число которое мы хотим чтобы выводилось на 1 страничке
     * @return void
     */
    public function getStart()
    {
        return ($this->currentPage - 1) * $this->perpage;
    }
    /**
     * getParams()
     * Берём ссылку в адресной строке розбиваем строку по "?"
     * Далее проверяем существует ли знак &
     * Записываем в переменную params значения после &
     * Проходимся в цикле и если есть совпадение в функции с 
     * руглярным выраженим то конкатенируем её с переменной uri
     * @return uri
     */
    public function getParams()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?',$url);
        $uri = $url[0] . '?';
        if(isset($url[1])&&$url[1]!= '')
        {
            $params = explode('&',$url[1]);
            foreach($params as $param)
            {
                if(!preg_match('#page=#', $param))
                    $uri .= "{$param}&amp;";
            }
        }
        return $uri;
    }
    
}