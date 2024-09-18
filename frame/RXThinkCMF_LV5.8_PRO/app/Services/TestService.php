<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink.cn@gmail.com>
// +----------------------------------------------------------------------

namespace App\Services;

use App\Models\AdminModel;
use App\Http\Requests\AdminRequest;

/**
 * 测试-服务类
 * @author zongjl
 * @date 2019/5/24
 * Class TestService
 * @package App\Services
 */
class TestService extends BaseService
{
    /**
     * 构造方法
     * @author zongjl
     * @date 2019/5/24
     */
    public function __construct()
    {
        parent::__construct();
        $this->model = new AdminModel();
        $this->validate = new AdminRequest();
    }

    /**
     * 获取数据列表
     * @param $param 参数
     * @param $admin_id 人员ID
     * @return array 返回结果
     * @author zongjl
     * @date 2019/5/24
     */
    public function getAdminList($param, $admin_id)
    {
        $map = [
            'query' => [
                ['realname', 'like', '%相约%'],
            ],
            'sort' => [
                ['id', 'desc']
            ],
            'limit' => '0,2',
        ];
        $result = $this->model->getData($map, function ($info) {
            return [
                'id' => $info['id'],
                'realname' => $info['realname'],
            ];
        });
        return message(MESSAGE_OK, true, $result);
    }

    /**
     * 获取分页数据
     * @param $param 参数
     * @param $admin_id 人员ID
     * @return array 返回结果
     * @author zongjl
     * @date 2019/5/27
     */
    public function getAdminList2($param, $admin_id)
    {
        $map = [
            'query' => [
                ['realname', 'like', '%相约%'],
            ],
            'sort' => [
                ['id', 'desc']
            ],
            'page' => 1,
            'perpage' => 1,
        ];
        $result = $this->model->pageData($map, function ($info) {
            return [
                'id' => $info['id'],
                'realname' => $info['realname'],
            ];
        });
        return $result;
    }
}
