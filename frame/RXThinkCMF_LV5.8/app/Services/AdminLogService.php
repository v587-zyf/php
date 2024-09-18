<?php


namespace App\Services;


use App\Models\ActionLogModel;

/**
 * 登录日志-服务类
 * @author 牧羊人
 * @since 2020/8/30
 * Class AdminLogService
 * @package App\Services
 */
class AdminLogService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/8/30
     * AdminLogService constructor.
     */
    public function __construct()
    {
        $this->model = new ActionLogModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getList()
    {
        // 查询条件
        $param = request()->all();

        // 查询条件
        $query = $this->model->where(function ($query) {
            $query->where('title', 'like', '%系统登录%')
                ->orWhere('title', 'like', '%系统退出%');
        });
        // 日志标题模糊查询
        $title = isset($param['title']) ? $param['title'] : '';
        if ($title) {
            $query = $query->where("title", "like", "%{$title}%");
        }

        //获取数据总数
        $count = $query->count();

        // 获取数据列表
        $offset = (PAGE - 1) * PERPAGE;
        $result = $query->orderByDesc("id")->offset($offset)->limit(PERPAGE)->get()->toArray();
        //返回结果
        $message = array(
            "msg" => '操作成功',
            "code" => 0,
            "data" => $result,
            "count" => $count,
        );
        return $message;
    }
}
