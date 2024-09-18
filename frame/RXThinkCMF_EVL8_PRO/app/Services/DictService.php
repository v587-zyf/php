<?php


namespace App\Services;

use App\Models\DictModel;

/**
 * 字典-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class DictService
 * @package App\Services
 */
class DictService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * DictService constructor.
     */
    public function __construct()
    {
        $this->model = new DictModel();
    }

    /**
     * 获取字典列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();
        // 查询条件
        $map = [];
        // 字典类型ID
        $dicttypeId = getter($param, "dicttypeId", 0);
        if ($dicttypeId) {
            $map[] = ['dicttype_id', '=', $dicttypeId];
        }
        // 字典名称
        $name = getter($param, "name");
        if ($name) {
            $map[] = ['name', 'like', "%{$name}%"];
        }
        // 字典编码
        $code = getter($param, 'code');
        if ($code) {
            $map[] = ['code', '=', $code];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        return message("操作成功", true, $list);
    }
}
