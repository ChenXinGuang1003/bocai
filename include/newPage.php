<?php
class newPage{

	var $sumNum		=	0; //记录总个数
	var $pageNum	=	20; //每行显示多少页，默认显示 20 页
	var $sumPage	=	0; //总页数
	var $thisPage	=	0; //当前页数
	var $upPage		=	0; //上一页
	var $up10Page	=	0; //上一组
	var $nextPage	=	0; //下一页
	var $next10Page	=	0; //下一组
	
	/**
	*	验证并设置当前页数
	*	num 要验证设置的页数
	*	sum 记录总个数
	*	pn 每页显示记录个数，默认每页显示 20 条
	*	$showPN 每行显示多少页，默认显示 20 页
	*	return 验证设置后的当前页数
	**/
	function check_Page($num,$sum,$pn=20,$showPN=20){
		
		if($showPN != $this->pageNum) $this->pageNum	=	$showPN;
		if($sum<1) $sum = 1;
		
		$this->sumNum		=	$sum; //设置记录总个数
		$this->sumPage		=	ceil($sum/$pn); //设置总页数
		
		//设置当前页
		if($num > $this->sumPage){ //当前页>总页数，设置为最后一页
			$this->thisPage	=	$this->$sumPage;
		}elseif($num < 1){ //当前页 < 1，设置为第 1 页
			$this->thisPage	=	1;
		}else{
			$this->thisPage	=	$num;
		}
		
		//设置上一页
		if($this->thisPage > 1){
			$this->upPage	=	$this->thisPage-1;
		}else{
			$this->upPage	=	1;
		}
		//设置下一页
		if($this->thisPage < $this->sumPage){
			$this->nextPage	=	$this->thisPage+1;
		}else{
			$this->nextPage	=	$this->sumPage;
		}
		$this->up10Page		=	floor($this->thisPage/$this->pageNum)*$this->pageNum-$this->pageNum; //设置上10页
		$this->next10Page	=	floor($this->thisPage/$this->pageNum)*$this->pageNum+$this->pageNum; //设置下10页
		
		return	$this->thisPage;
	}
	
	/**
	*	格式：5/150/3000 << < 10 11 12 13 14 15 16 17 18 19 > >> 
	*	url 要跳转到的页面
	*	return 具体的分页 html 代码
	**/
	function get_htmlPage($url){
        if(strpos($url,"?")===false){
            $url .= "?1=1";
        }
		$html	=	'';
        $url = str_replace('&page='.$this->thisPage,'',$url);
		if($this->thisPage > $this->pageNum-1){ //上一组
			$html	.=	' <a href="'.$url.'&page='.$this->up10Page.'" title="上'.$this->pageNum.'页">&lt;&lt;</a>';
		}
		if($this->thisPage > 1){ //上一页
			$html	.=	' <a href="'.$url.'&page='.$this->upPage.'" title="上一页">&lt;</a>';
		}
		$page	=	floor($this->thisPage/$this->pageNum)*$this->pageNum; //循环用的页数
		$i		=	0; //退出循环的页数记录器
		if($page == 0) $i	=	1; //第一行没有 0 页
		while($i<$this->pageNum && ($page+$i)<=$this->sumPage){ //每次显示9页，不能超过总页数
			if(($page+$i) == $this->thisPage){ //当前页不用超连接
				$html	.=	' '.($page+$i);
			}else{
				$html	.=	' <a href="'.$url.'&page='.($page+$i).'">'.($page+$i).'</a>';
			}
			$i++;
		}
		if($this->thisPage < $this->sumPage){ //下一页
			$html	.=	' <a href="'.$url.'&page='.$this->nextPage.'" title="下一页">&gt;</a>';
		}
		if($this->sumPage-$page > $this->pageNum-1){ //下一组
			$html	.=	' <a href="'.$url.'&page='.$this->next10Page.'" title="下'.$this->pageNum.'页">&gt;&gt;</a>';
		}
		
		return $html.' '.$this->thisPage.'/'.$this->sumPage.'/'.$this->sumNum;
	}
}
?>