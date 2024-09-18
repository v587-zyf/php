<?php


namespace App\Models;

/**
 * 定时任务-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class CrontabModel
 * @package App\Models
 */
class CrontabModel extends BaseModel
{
    // 设置数据表
    protected $table = "crontab";

    /**
     * 获取记录信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 任务类型
            if ($info['type']) {
                $info['type_name'] = config('admin.crontab_type')[$info['type']];
            }
            // 开始时间
            if ($info['start_time']) {
                $info['format_start_time'] = datetime($info['start_time']);
            }
            // 结束时间
            if ($info['end_time']) {
                $info['format_end_time'] = datetime($info['end_time']);
            }
            // 执行时间
            if ($info['execute_time']) {
                $info['format_execute_time'] = datetime($info['execute_time']);
            }
        }
        return $info;
    }
}
