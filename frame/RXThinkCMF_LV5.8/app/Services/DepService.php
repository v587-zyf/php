<?php


namespace App\Services;

use App\Models\DepModel;

/**
 * 部门管理-服务类
 * @author 牧羊人
 * @since 2020/8/28
 * Class DepService
 * @package App\Services
 */
class DepService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/28
     * DepService constructor.
     */
    public function __construct()
    {
        $this->model = new DepModel();
    }

    /**
     * 获取部门列表
     * @return array
     * @since 2020/11/13
     * @author 牧羊人
     */
    public function getList()
    {
        $list = $this->model->getList([], [['sort', 'asc']]);
        if ($list) {
            foreach ($list as &$val) {
                if (intval($val['type']) <= 2) {
                    $val['open'] = true;
                } else {
                    $val['open'] = false;
                }
            }
        }
        return message("操作成功", true, $list);
    }

}
