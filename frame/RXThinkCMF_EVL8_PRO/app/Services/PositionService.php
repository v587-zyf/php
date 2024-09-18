<?php


namespace App\Services;

use App\Models\PositionModel;

/**
 * 岗位管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class PositionService
 * @package App\Services
 */
class PositionService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * PositionService constructor.
     */
    public function __construct()
    {
        $this->model = new PositionModel();
    }

    /**
     * 获取岗位列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getPositionList()
    {
        $list = $this->model->where([
            ['status', '=', 1],
            ['mark', '=', 1],
        ])->orderBy("sort", "asc")
            ->get()
            ->toArray();
        return message("操作成功", true, $list);
    }

}
