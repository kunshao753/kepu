<?php
namespace App\Common;
/**
 * 分页类
 * 基于url的分页类
 * 
 *  应该在每个网站建立一个工厂方法使用
 * $pagelink=UrlFactory::getPage();
 * //在工厂方法里面预先设置好 callback
 * $pagelink->setFilter(array('UrlFactory','seoUrl'));
 * $pagelink->setPageName('page');
 * return $pagelink;
 * ==========
 * 调用的使用
 * $pagelink->setUrl($current_url);
 * $pagelink->setCount(100,10);//设置总数 每页数量
 * $pageinfo=$pagelink->getList()
 *
 *
 */
class UrlPage {

    protected $max_page;
    protected $max_count;
    protected $page;
    protected $show_page_num;
    public $pagesize = 10;
    /**
     * 扩展页面 每次跳跃的数量
     * 扩展跳转页面大小 显示 10, ... 11,12,13,[14],15,16 ... 30,40,50 当为 20 的时候 10,30,50,70
     * @var int
     */ 
    public $ext_pagesize = 10;

    //扩展页面 显示 多个个链接 前后个为3个
    public $ext_page_num = 3;

    
    protected $current_url = '';
    protected $page_param_name = 'p';
    protected $callback = false;
    /**
     * 是否显示当前页
     * @var <type>
     */
    public $show_current_page = false;

    public function __construct() {
        $this->current_url = $_SERVER['REQUEST_URI'];
    }

    public function setPageName($name='p') {
        $this->page_param_name = $name;
    }

    /**
     * 设置url的过滤器
     * @param <type> $callback
     */
    public function setFilter($callback) {
        $this->callback = $callback;
    }

    /**
     * 设置当前的url，比如 必须是带参数的 /index.php?r=sss&page=2
     * @param <type> $url
     */
    public function setUrl($url) {
        $this->current_url = $url;
    }
    
    protected $page_limit=0;

    /**
     *  设置翻页限制
     * @param type $max
     */
    public  function setPageLimit($max=50){
        $this->page_limit=$max;
        if($this->page_limit>0){
            $this->max_page=$max;
        }
    }

    /**
     * 设置记录数
     *
     * @param unknown_type $count
     * @param unknown_type $pagesize
     */
    public function setCount($count, $pagesize=10) {
        $this->max_page = ceil($count / $pagesize);
        if($this->page_limit>0){
            $this->max_page=min($this->page_limit,$this->max_page);
        }
        $this->max_count = $count;
        $this->pagesize = $pagesize;
    }

    /**
     * 设置当前页
     *
     * @param unknown_type $current_page
     */
    public function setPage($current_page) {
        $current_page = intval($current_page);
        if ($current_page < 1) {
            $current_page = 1;
        }
        $this->page = $current_page;
    }


    /**
     *获取页的列表
     * @param <type> $n 每次展示多少链接
     * @param <type> $ext_count  扩展链接展示多少
     * @return <type>
     */
    public function getList($n=10,$ext_count=0) {
        $info = array();
        // $first
        $info['first'] = $this->mkurl(1);
        $info['last'] = $this->mkurl($this->max_page);
        $page = $this->page;

        //扩展分页 显示 1 ... 30 ,40 ,50 页
        $info['ext_prev']=array();
        $info['ext_next']=array();

        for($i=0;$i<$this->ext_page_num;$i++){
            //echo 'hi:'.$i;
            $t=$this->mkurl( (ceil($this->page/$this->ext_pagesize)-$this->ext_page_num)*$this->ext_pagesize+$this->ext_pagesize*$i);
            //print_r($t);
            if($t['page']>0){
                $info['ext_prev'][]=$t;
            }
            
            $t=$this->mkurl( (ceil($this->page/$this->ext_pagesize)+$i+1)*$this->ext_pagesize);
            //print_r($t);
            if($t['page']<=$this->max_page){
                $info['ext_next'][]=$t;
            }


        }
        if ($page > 1) {
            $info['front'] = $this->mkurl($page - 1);
        } else {
            $info['front'] = $this->mkurl(1);;
        }
        if ($page < $this->max_page) {
            $info['next'] = $this->mkurl($page + 1);
        } else {
            $info['next'] = $this->mkurl($this->max_page);
        }
        $info['page'] = $this->page;
        $info['maxpage'] = $this->max_page;
        //中间列表页
        $list = array();
        //当前页的前后N页
        if ($this->max_page - $page < $n / 2) {
            //向左靠齐

            for ($i = $this->max_page - $n > 0 ? $this->max_page - $n : 1; $i <= $this->max_page; $i++) {
                // $list[$i] = $this->mkurl($i);
                $list[] = $this->mkurl($i);
            }
        }else{
             if ($page < $n / 2) {
                $max = $this->max_page;
                $j = 0;
                for ($i = 1; $i < ($max); $i++) {
                    if (++$j > $n) {
                        break;
                    }
                    // $list[$i] = $this->mkurl($i);
                    $list[] = $this->mkurl($i);
                }
            }
        }

       

        if ($page >= $n / 2 && $page <= $this->max_page - ceil($n / 2)) {
            for ($i = 1 + $page - ceil($n / 2); $i < $page + ceil($n / 2); $i++) {
                // $list[$i] = $this->mkurl($i);
                $list[] = $this->mkurl($i);
            }
        }
        $info['page_list'] = $list;
        //为了goto page 设计的
        $rand_int=rand(10000000,99999999);
        $info['page_tpl'] = $this->mkurl($rand_int);
        return $info;
    }

    private function mkurl($page) {

        //如果是当前页就显示空
        if (!$this->show_current_page && $page == $this->page) {
            return array('url'=>'','page'=>$page,'name'=>$page);
        }
        $url_info = parse_url($this->current_url);
        $base_url='';
        if(isset($url_info['host'])){
            $base_url='http://'.$url_info['host'];
        }
        $param = array();
        if (isset($url_info['query'])) {
            parse_str($url_info['query'], $param);
        }
        $param[$this->page_param_name] = $page;
        $url = $base_url . $url_info['path'] . '?' . http_build_query($param);
        if ($this->callback) {
            $url = call_user_func_array($this->callback, array($url));
        }
        return array('url'=>$url,'page'=>$page,'name'=>$page);
    }


    public static function makePage($count,  $page ,$url,$pagesize=10, $pagename='page', $show_item=10) {
        $split = new UrlPage();
        $split->setCount($count, $pagesize);
        $split->setUrl($url);
        $split->setPage($page);
        $split->setPageName($pagename);
        return $split->getList($show_item);
    }

    public static function test() {
        //和以前的老的代码进行比对
        $current_url = 'http://www.a.com/index.php?r=test/ss&page=2';
        $split = new UrlPage();
        $split->setUrl($current_url);
        $split->setCount(4300, 10);
        $split->setPage(25);
        $split->setPageName('p');
        print_r($split->getList());
    }

   
}

//test ok
if (isset($_SERVER['SCRIPT_FILENAME']) && realpath($_SERVER['SCRIPT_FILENAME']) == __FILE__) {
    UrlPage::test();
}