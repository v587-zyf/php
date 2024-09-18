<?php


namespace App\Services;

use App\Models\CityModel;

/**
 * 城市管理-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class CityService
 * @package App\Services
 */
class CityService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * CityService constructor.
     */
    public function __construct()
    {
        $this->model = new CityModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/9/8
     * @author 牧羊人
     */
    public function getList()
    {
        // 查询条件
        $map = [
            ['pid', '>=', 1],
        ];
        $list = $this->model->getAll($map);
        //返回结果
        $message = array(
            "msg" => '操作成功',
            "code" => 0,
            "data" => $list,
            "count" => count($list),
        );
        return $message;
    }
}
