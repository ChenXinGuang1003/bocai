<?php
/**
* Page effects category
*/
class pl{
	 
	/**
	* Verify the current page
	* $pagenum	current page
	* $pageSum	totla pages
	*/
	 function getPageNum($pageNum,$pageSum){
	      if($pageNum < 1)        $pageNum = 1;
		  if($pageNum > $pageSum) $pageNum = $pageSum;
		  
		  return $pageNum;
	 }
	 
	/**
	* Get all the pages 
	* $num_row	Record the total number pages
	* $pagenum	Record per page number
	*/
	 function getPageSum($num_rows,$pagenum){
	      $pageSum = 1;
		  if(0 == $pagenum) $pagenum = 10;
		  
		  if($num_rows <= $pagenum);
		  else if(0 == ($num_rows % $pagenum)) $pageSum = $num_rows / $pagenum;
		  else{
		      $pageSum = ceil($num_rows / $pagenum);
		  }
		  
		  return $pageSum;
     }
	 
	/**
	* Remove the effect of code HTML pages
	* $pageNum		current page
	* $pageSum		total page
	* $pageSumNum	the total number of activies
	* $pageShowNum	Records per page number
	* $other		Page address back it with other parameters, such as? Id = 1 etc.
	*/
	function getPagePHP($pageNum,$pageSum,$pageSumNum,$pageShowNum,$url,$other=''){
		 
		 if($other){
		 	$url	= $url.'.php'.$other;
			$other	= '&amp;';
		}else{
			$url	= $url.'.php';
			$other	= '?';
		}
		 
		 $pageStr	=	'';
		 for($i=1;$i<=$pageSum;$i++){
		 	if($i==$pageNum) $pageStr .= $i.' ';
			else $pageStr .= '<a href="'.$url.$other.'pageNum='.$i.'">'.$i.'</a> ';
		 }
		 $pageStr .= '共'.$pageSum.'页,共'.$pageSumNum.'条数据';
		 
		 return $pageStr;
	}
}
?>