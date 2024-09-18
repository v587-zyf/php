<?php


namespace App\Services;

use App\Models\ConfigModel;

/**
 * 配置管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class ConfigService
 * @package App\Services
 */
class ConfigService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ConfigService constructor.
     */
    public function __construct()
    {
        $this->model = new ConfigModel();
    }

    /**
     * 获取配置列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();
        // 查询条件
        $map = [];
        // 配置分组ID
        $groupId = getter($param, "groupId", 0);
        if ($groupId) {
            $map[] = ['config_group_id', '=', $groupId];
        }
        // 配置标题
        $title = getter($param, "title");
        if ($title) {
            $map[] = ['name', 'title', "%{$title}%"];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        return message("操作成功", true, $list);
    }

}
