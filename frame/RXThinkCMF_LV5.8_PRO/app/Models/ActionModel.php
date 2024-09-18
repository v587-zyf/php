<?php


namespace App\Models;

/**
 * 行为日志-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionModel
 * @package App\Models
 */
class ActionModel extends BaseModel
{
    // 设置数据表
    protected $table = "action";

    /**
     * 获取记录信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $this->cacheDelete($id);
        $info = parent::getInfo($id);
        if ($info) {
            // 来源类型
            if ($info['type']) {
                $info['type_name'] = config('admin.action_type')[$info['type']];
            }
            // 执行类型
            if ($info['execution']) {
                $info['execution_name'] = config("admin.action_execution")[$info['execution']];
            }
        }
        return $info;
    }
}
