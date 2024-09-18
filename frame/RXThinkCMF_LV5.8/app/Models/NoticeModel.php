<?php


namespace App\Models;

/**
 * 通知公告-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class NoticeModel
 * @package App\Models
 */
class NoticeModel extends BaseModel
{
    // 设置数据表
    protected $table = "notice";

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
            // 通知来源
            if ($info['source']) {
                $info['source_name'] = config('admin.notice_source')[$info['source']];
            }
            // 通知状态
            if ($info['status']) {
                $info['status_name'] = config('admin.notice_status')[$info['status']];
            }
            // 发布时间
            if ($info['publish_time']) {
                $info['format_publish_time'] = datetime($info['publish_time']);
            }
        }
        return $info;
    }
}
