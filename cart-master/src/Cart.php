<?php
namespace \cart;
use \cart\build\Base;

/**
 * 购物车处理类
 * Class Cart
 * @package \cart
 */
class Cart {
	//连接
	protected $link = null;

	//更改缓存驱动
	protected function driver() {
		$this->link = new Base( $this );

		return $this;
	}

	public function __call( $method, $params ) {
		if ( is_null( $this->link ) ) {
			$this->driver();
		}

		return call_user_func_array( [ $this->link, $method ], $params );
	}
}