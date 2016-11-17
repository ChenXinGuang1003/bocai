<?php

/**
 * @author	xiaozhao
 * @copyright 2013
 */

class http
{
	protected $use_cookie;
	protected $cookie;
	private $request_header = array(
		'Host'				=>	'',
		'Connection'		=>	'keep-alive',
		//'User-Agent'		=>	'PHP_HTTP/5.2 (compatible; Chrome; MSIE; Firefox; Opera; Safari; QQ:270656184)',
		//'User-Agent'		=>	'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; Sicent1; Sicent1)',
		'User-Agent'		=>	'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.11 (KHTML, like Gecko) Chrome/17.0.963.79 Safari/535.11',
		'Accept'			=>	'*/*',
		'Accept-Encoding'	=>	'gzip,deflate',
		'Accept-Language'	=>	'zh-cn',
		'Cookie'			=>	'',
	);
	
	public $debug;
	public $enable_redirect = true;
	private $url;
	private $url_info;
	protected $referer;
	protected $timeout = 5;
	
	protected $header;
	protected $recv;
	protected $status;
	protected $mime;
	protected $length;
	
	public function __construct($use_cookie = true)
	{
		$this->use_cookie = (bool)$use_cookie;
	}
	
	public function set_header($name,$value)
	{
		$this->request_header[$name] = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function debug($var,$name = '')
	{
		if ($this->debug && $var)
		{
			echo '<div style="border: 1px solid red; padding: 8px; margin: 8px;">'.
				 '<strong>&lt;<font color="red">'.$name.'</font>&gt; - http debug</strong> ';
			$content = htmlspecialchars(print_r($var,true));
			echo '<pre>'.$content.'</pre>';
			echo '</div>';
		}
	}
	
	public function get($url, $form='', $referer='')
	{
		//准备工作
		$this->prepare($url,$referer);
		
		//处理表单数据
		if( $query = self::build_query($form) )
			$this->url_info['query'] = '?'.$query;
		
		//打开socket
		$fp = $this->getfp();
		if(!$fp)return false;
		
		//发送请求
		$header = $this->build_request('get');
		if($this->debug)$this->debug($header,'Request Header');
		fputs($fp,$header);
		
		//接收数据
		$this->receive_data($fp);
		fclose($fp);
		$this->process_header();
		
		if($this->debug)$this->debug($this->recv,'Content');
		return $this->recv;
	}
	
	public function post($url, $form='', $referer='')
	{
		//准备工作
		$this->prepare($url,$referer);
		
		//处理表单数据
		$query = self::build_query($form);
		
		//打开socket
		$fp = $this->getfp();
		if(!$fp)return false;
		
		//发送请求
		$content_type = 'text/xml';//application/x-www-form-urlencoded';
		$header = $this->build_request('post',$content_type,strlen($query));
		if($this->debug)
		{
			$this->debug($header,	'Request Header');
			$this->debug($query,	'Form Data');
		}
		fputs($fp,$header);
		fputs($fp,$query);
		
		//接收数据
		$this->receive_data($fp);
		fclose($fp);
		$this->process_header();
		
		if($this->debug)$this->debug($this->recv,'Content');
		return $this->recv;
	}
	
	public function post2($url,$form='',$files=array(),$referer='')
	{
		//准备工作
		$this->prepare($url,$referer);
		
		//处理表单数据
		$boundary = '----Boundary'.md5(microtime());
		$format =	"--{$boundary}\r\n".
					"Content-Disposition: form-data; name=\"%s\"\r\n\r\n".
					"%s\r\n";
		$form_data = http_build_query($form,'',"&");
		preg_match_all('/(.*?)=(.*?)(&|$)/',$form_data,$matches,PREG_SET_ORDER);
		$form_data = '';
		foreach($matches as $v)
		{
			$form_data .= sprintf($format,urldecode($v[1]),urldecode($v[2]));
		}
		
		$format	=	"--{$boundary}\r\n".
					"Content-Disposition: form-data; name=\"%s\"; filename=\"%s\"\r\n".
					"Content-Type: application/octet-stream\r\n\r\n".
					"%s\r\n";
		foreach($files as $file)
		{
			$form_data .= sprintf($format,$file['name'],basename($file['file']),file_get_contents($file['file']));
		}
		$form_data .= "--{$boundary}--\r\n";
		
		//打开socket
		$fp = $this->getfp();
		if(!$fp)return false;
		
		//发送请求
		$content_type = 'multipart/form-data; boundary='.$boundary;
		$content_length = strlen($form_data);
		$header = $this->build_request('post',$content_type,$content_length);
		if($this->debug)$this->debug($header,'Request Header');
		fputs($fp,$header);
		fputs($fp,$form_data);
		
		//接收数据
		$this->receive_data($fp);
		fclose($fp);
		$this->process_header();
		
		if($this->debug)$this->debug($this->recv,'Content');
		return $this->recv;
	}
	
	private function prepare($url,$referer)
	{
		$this->error = '';
		$this->referer = $referer=='auto' ? $this->url : (string)$referer;
		$this->url = $url;
		$this->url_info = $this->parse_url($url);
		
		$this->header = '';
		$this->recv = '';
		$this->status = 0;
		$this->mime = '';
		$this->length = 0;
	}
	
	private function getfp()
	{
		$ui = $this->url_info;
		if( !in_array($ui['scheme'],array('http','https')) )
		{
			$this->error = '不支持的协议！';
			return false;
		}
		
		$fp = $ui['scheme']=='https' ? 
					fsockopen('ssl://'.$ui['host'],$ui['port'],$errno,$errstr,$this->timeout):
					fsockopen($ui['host'],$ui['port'],$errno,$errstr,$this->timeout);
		
		if(!$fp)
		{
			$this->error = "{$errno} : {$errstr}";
		}
		return $fp;
	}
	
	public static function parse_url($url)
	{
		$url = parse_url($url);
		if(!isset($url['port'])) $url['port'] = ($url['scheme'] == 'https' ? 443 : 80);
		$url['query'] = isset($url['query']) ? ('?'.$url['query']) : '';
		if(!isset($url['path'])){$url['path'] = '/';}
		return $url;
	}
	
	public static function build_query($form)
	{
		//处理附加数据
		return ( is_array($form) || is_object($form) ) ? 
			http_build_query($form) : (string)$form ;
	}
	
	private function build_request($method, $content_type='', $content_length='')
	{
		$header = strtoupper($method)." {$this->url_info["path"]}{$this->url_info["query"]} HTTP/1.1\r\n";
		
		//修改默认请求头
		$headers = $this->request_header;
		if( !empty($this->referer) ) 
			$headers['Referer'] = $this->referer;
		
		$headers['Host'] = $this->url_info['host'];
		$headers['Content-Length']	= $content_length;
		$headers['Content-Type']	= $content_type;
		
		if($this->use_cookie && $cookie = $this->get_cookie($this->url_info['host'],$this->url_info['path']))
			$headers['Cookie'] = $cookie;
		foreach($headers as $k=>$v)
		{
			if( strlen($v)>0 )
				$header .= "{$k}: {$v}\r\n";
		}
		$header .= "\r\n";
		
		return $header;
	}
	
	public static function fread_my($fp,$length)
	{
		$data = '';
		$length = intval($length);
		
		while( strlen($data) < $length && !feof($fp) )
			$data .= fread($fp, $length - strlen($data));
		
		return $data;
	}
	
	private function receive_data($fp)
	{	
		$this->receive_header($fp);
		if( strlen($this->header) == 0 ) return ;
		
		//chunk模式
		if(preg_match("|transfer-encoding:\s*?chunked|i",$this->header))
		{
			while( !feof($fp) && ($pack_len = hexdec(fgets($fp))) )
			{
				$this->recv .= self::fread_my($fp,$pack_len);
				fgets($fp);//读取\r\n
			}
			//fgets($fp);//读取\r\n
			return;
		}
		
		//keep-alive 方式的处理;
		$connection = $this->request_header['Connection'];
		if(strtolower($connection) == "keep-alive")
		{
			if(preg_match("|content-length:\s*?([0-9]{1,})|i",$this->header,$length))
			{
				$length=(int)$length[1];
				$this->length = $length;
				$this->recv = self::fread_my($fp, $length);
				return;
			}
					
			else if(preg_match("|Connection:\s*?Close|i",$this->header))
			{
				//服务器强制使用close方式
				NULL;//这里没有return;以便继续接收数据
			}
			else if(stripos($this->header,"HTTP/1.1 100 continue")!==false)
			{
				$this->header = '';
				$this->receive_data($fp);
				return;
			}
			else
			{
				$this->error = '无法继续接收数据！';
				return;
			}
		}
		
		while(!feof($fp))
			$this->recv .= fread($fp,8192);
	}
	
	private function receive_header($fp)
	{
		do
		{
			$this->header .= fgets($fp);
		}
		while(!strpos($this->header,"\r\n\r\n") && !feof($fp));

		if($this->debug)$this->debug($this->header,'Response Header');
		
		//截取响应头
		$this->header = substr($this->header,0,-4);
	}
	
	private function process_header()
	{
		$http_headers = explode("\r\n",$this->header);
		
		preg_match('|HTTP/1.[10]\s*([0-9]{1,3})\s*(.*)$|i',$http_headers[0],$match);
		$this->status = (int)$match[1];
		unset($http_headers[0]);
		
		foreach($http_headers as $header)
		{
			list($header_name,$header_content) = explode(":",$header,2);
			$header_name	=	strtolower(trim($header_name));
			$header_content	=	trim($header_content);
			
			switch($header_name)
			{
				case "content-type":
					$mime = explode(';',$header_content,2);
					$this->mime = trim($mime[0]);
					unset($mime);
					break;
				case "set-cookie":
					if($this->use_cookie)
						$this->parse_cookie($header_content);
					break;
				case "content-length":
					$this->length = (int)$header_content;
					break;
				case "content-encoding":
					if($header_content == 'gzip')
					{
						$this->recv = gzinflate(substr($this->recv,10,-8));
					}
					elseif($header_content == 'deflate')
					{
						$this->recv = gzinflate($this->recv);
					}
					$decode_length = strlen($this->recv);
					break;
				case "location":
					$location = self::convert_url($header_content,$this->url);
					break;
				default:
					continue;
			}
		}
		
		if(isset($decode_length))
			$this->length = $decode_length;
		
		if($this->enable_redirect && in_array($this->status,array(302,301)) && !empty($location) )
			$this->get($location,'',$this->referer);
		return ;
	}
	
	private function parse_cookie($header)
	{
		//匹配cookie键名和值
		preg_match('|([^=]*?)=([^;]*)|',$header,$_cookie);
		
		$name = trim($_cookie[1]);
		$value = trim($_cookie[2]);
		
		//从header中匹配域名
		if(preg_match('|domain=([^;]*)|i',$header,$domain))
		{
			$domain = $domain[1];
			$hostonly = false;
		}
		else
		{
			$domain = $this->url_info['host'];
			$hostonly = true;
		}
		
		//从header中匹配路径
		if(preg_match('|path=([^;]*)|i',$header,$path))
		{
			$path = $path[1];
		}
		else
		{
			$path = $this->url_info['path'];
			$path = substr($path,0,strrpos($path,'/'));
			if(empty($path))$path = '/';
		}
		
		//从header中匹配时间
		if(preg_match('|expires=([^;]*)|i',$header,$expires))
		{
			$expires = $expires[1];
			
			//32位机时间戳溢出修正
			if(preg_match('|\d{2}-[a-z]{3,4}-(\d*)|i',$expires,$match))
			{
				if($match[1] > 38 && $match[1] < 100)
					$expires = '2038-01-18';
			}
		}
		else
		{
			$expires = '2038-01-18';
		}
		$this->_set_cookie($name,$value,$expires,$path,$domain,$hostonly);
	}
	
	public function set_cookie($name,$value,$expire,$path,$domain,$secure = '',$hostonly = false)
	{
		if(empty($name)||empty($value))
		{
			return false;
		}
		else
		{
			$name = rawurlencode($name);
			$value = rawurlencode($value);
		}
		if(empty($expire))$expire = '2038-01-18';
		if(empty($path))$path = '/';
		if(empty($domain))
			return false;
		else
			$domain = strtolower($domain);
		
		$this->_set_cookie($name,$value,$expire,$path,$domain,$hostonly);
		return true;
	}
	private function _set_cookie($name,$value,$expire,$path,$domain,$hostonly = false)
	{
		$domain = explode('.',$domain);
		$count = count($domain);
		$pCookie = &$this->cookie;
		for($i=$count-1;$i>=0;$i--)
		{
			$subdomain = $domain[$i];
			if(trim($subdomain) == '')continue;
			$pCookie = &$pCookie[$subdomain];
		}
		
		if($hostonly)
			$pCookie = &$pCookie['..'];
		else
			$pCookie = &$pCookie["."];
			
		$pCookie = &$pCookie[$path];
		
		if(strtotime($expire)<time())
			unset($pCookie[$name]);
		else
			$pCookie[$name] = $value;
	}
	
	public function get_cookie($domain = '',$path = '/')
	{
		if(empty($domain))
			$domain = $this->url_info['host'];
		if(empty($path))
			$path = '/';
		
		$domain = explode('.',$domain);
		$count = count($domain);
		
		$pCookie = $this->cookie;
		$Cookie = '';
		for($i=$count-1;$i>=0;$i--)
		{
			//遍历各级域名
			$subdomain = $domain[$i];
			if(trim($subdomain) == '')continue;
			
			if(isset($pCookie[$subdomain]))
				$pCookie = &$pCookie[$subdomain];
			else
				{unset($pCookie);break;}
			
			if( isset($pCookie['.']) && is_array($pCookie['.']) )
			{
				foreach($pCookie['.'] as $_path=>$_cookie)
				{
					//遍历路径
					if( $_cookie && strpos($path,$_path)===0 )
					{
						foreach($_cookie as $key=>$val)
						{
							if(empty($key))contine;
							$Cookie .= $key.'='.$val.';';
						}
					}
				}
			}
		}
		
		if( $i==-1 && isset($pCookie) && isset($pCookie[".."]) && is_array($pCookie[".."]) )
		{
			foreach($pCookie[".."] as $_path=>$_cookie)
			{
				if( $_cookie && strpos($path,$_path)===0 )
				{
					foreach($_cookie as $key=>$val)
					{
						if(empty($key))contine;
						$Cookie .= $key.'='.$val.';';
					}
				}
			}
		}
		
		return $Cookie;
	}
	public function bind_cookie(&$ptr)
	{
		$this->cookie = &$ptr;
	}
	public function export_cookie()
	{
		return $this->cookie;
	}
	public function import_cookie($cookie)
	{
		$this->cookie = $cookie;
	}
	
	/**
	 * url相对路径转绝对路径
	 **/
	static public function convert_url($url,$pos)
	{
		if(empty($url) || strpos($url,'#') ===0 )
			return $pos;
		elseif(strpos($url,'http://') === 0 || strpos($url,'https://')===0)
			return $url;
		else
		{
			$p = parse_url($pos);
			$prefix  = $p['scheme'].'://'.$p['host'];
			$prefix .= (isset($p['port']) && $p['port']!='80' ? ':'.$p['port'] : '');
			
			if(strpos($url,'/')===0)
				//绝对路径
				return $prefix.$url;
			elseif(strpos($url,'?')===0)
			{
				//以问号开始,将$url作为参数附加到$pos上
				return $prefix.'/'.$p['path'].$url;
			}
			else
			{
				//相对路径
				$p1 = (empty($p['path']) || $p['path'] == '/')? array() : explode('/',substr($p['path'],1));
				array_pop($p1);
				
				@list($p2,$q) = explode('?',$url,2);
				$p2 = explode('/',$p2);
				while(($e = array_shift($p2)) !== NULL)
				{
					if($e == '.')
						continue;
					elseif($e == '..')
						array_pop($p1);
					else
						array_push($p1,$e);
				}
				$path = join('/',$p1);
				return $prefix . '/' . $path . ($q ? '?'.$q : '') ;
			}
		}
	}
}
?>
