<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 南京RXThinkCMF研发中心
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <1175401194@qq.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers;


use App\Models\DemoModel;
use App\Services\DemoService;
use Illuminate\Http\Request;

/**
 * 演示管理-控制器
 * @author 牧羊人
 * @since: 2020/09/01
 * Class DemoController
 * @package App\Http\Controllers
 */
class DemoController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/09/01
     * LevelController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new DemoModel();
        $this->service = new DemoService();
    }


	/**
	 * 设置状态
	 * @return mixed
	 * @since 2020/09/01
	 * @author 牧羊人
	 */
	public function setStatus()
	{
		if (IS_POST) {
			$result = $this->service->setStatus();
			return $result;
		}
	}

	/**
	 * 设置是否VIP
	 * @return mixed
	 * @since 2020/09/01
	 * @author 牧羊人
	 */
	public function setIsVip()
	{
		if (IS_POST) {
			$result = $this->service->setIsVip();
			return $result;
		}
	}
	
}
