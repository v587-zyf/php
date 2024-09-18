<?php


namespace App\Services;

use App\Models\LevelModel;

/**
 * 职级管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class LevelService
 * @package App\Services
 */
class LevelService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * LevelService constructor.
     */
    public function __construct()
    {
        $this->model = new LevelModel();
    }

    /**
     * 获取职级列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getLevelList()
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
