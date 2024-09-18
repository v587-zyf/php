<?php


namespace App\Services;

use App\Models\DeptModel;

/**
 * 部门管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class DeptService
 * @package App\Services
 */
class DeptService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DeptService constructor.
     */
    public function __construct()
    {
        $this->model = new DeptModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];

        // 部门名称
        $name = getter($param, "name");
        if ($name) {
            $map[] = ['name', 'like', "%{$name}%"];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        return message("操作成功", true, $list);
    }

}
