<?php


namespace App\Services;

use App\Models\ActionLogModel;

/**
 * 登录日志-服务类
 * @author 牧羊人
 * @since 2020/11/12
 * Class LoginLogService
 * @package App\Services
 */
class LoginLogService extends BaseService
{
    /**
     *
     * @author 牧羊人
     * @since 2020/11/12
     * LoginLogService constructor.
     */
    public function __construct()
    {
        $this->model = new ActionLogModel();
    }

    /**
     *
     * @return array
     * @since 2020/11/12
     * @author 牧羊人
     */
    public function getList()
    {
        // 查询条件
        $param = request()->all();

        // 查询条件
        $query = $this->model->where(function ($query) {
            $query->where('title', 'like', '%登录系统%')
                ->orWhere('title', 'like', '%注销系统%');
        });
        // 用户账号
        $username = getter($param, "username");
        if ($username) {
            $query = $query->where("username", "=", $username);
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
