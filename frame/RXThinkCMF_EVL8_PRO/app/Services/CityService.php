<?php


namespace App\Services;

use App\Models\CityModel;

/**
 * 城市管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class CityService
 * @package App\Services
 */
class CityService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * CityService constructor.
     */
    public function __construct()
    {
        $this->model = new CityModel();
    }

    /**
     * 获取城市列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];
        // 上级ID
        $pid = intval(getter($param, 'pid', 0));
        if (!$pid) {
            $map[] = ['pid', '=', 1];
        } else {
            $map[] = ['pid', '=', $pid];
        }
        // 城市名称
        $name = getter($param, "name");
        if ($name) {
            $map[] = ['name', 'like', "%{$name}%"];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        if (!empty($list)) {
            foreach ($list as &$val) {
                if ($val['level'] <= 2) {
                    $val['hasChildren'] = true;
                }
            }
        }
        return message("操作成功", true, $list);
    }

}
