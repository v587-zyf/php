<?php


namespace App\Services;

/**
 * 服务基类
 * @author 牧羊人
 * @since 2020/11/10
 * Class BaseService
 * @package App\Services
 */
class BaseService
{
    // 模型
    protected $model;
    // 验证类
    protected $validate;

    /**
     * 获取数据列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        // 初始化变量
        $map = [];
        $sort = [['id', 'desc']];
        $is_sql = 0;

        // 获取参数
        $argList = func_get_args();
        if (!empty($argList)) {
            // 查询条件
            $map = (isset($argList[0]) && !empty($argList[0])) ? $argList[0] : [];
            // 排序
            $sort = (isset($argList[1]) && !empty($argList[1])) ? $argList[1] : [['id', 'desc']];
            // 是否打印SQL
            $is_sql = isset($argList[2]) ? isset($argList[2]) : 0;
        }

        // 打印SQL
        if ($is_sql) {
            $this->model->getLastSql(1);
        }

        // 常规查询条件
        $param = request()->input();
        if ($param) {
            // 筛选名称
            if (isset($param['name']) && $param['name']) {
                $map[] = ['name', 'like', "%{$param['name']}%"];
            }

            // 筛选标题
            if (isset($param['title']) && $param['title']) {
                $map[] = ['title', 'like', "%{$param['title']}%"];
            }

            // 筛选类型
            if (isset($param['type']) && $param['type']) {
                $map[] = ['type', '=', $param['type']];
            }

            // 筛选状态
            if (isset($param['status']) && $param['status']) {
                $map[] = ['status', '=', $param['status']];
            }

            // 手机号码
            if (isset($param['mobile']) && $param['mobile']) {
                $map[] = ['mobile', '=', $param['mobile']];
            }
        }

        // 设置查询条件
        if (is_array($map)) {
            $map[] = ['mark', '=', 1];
        } elseif ($map) {
            $map .= " AND mark=1 ";
        } else {
            $map .= " mark=1 ";
        }

        // 排序(支持多重排序)
        $query = $this->model->where($map)->when($sort, function ($query, $sort) {
            foreach ($sort as $v) {
                $query->orderBy($v[0], $v[1]);
            }
        });
        // 分页条件
        $offset = (PAGE - 1) * PERPAGE;
        $result = $query->offset($offset)->limit(PERPAGE)->select('id')->get();
        $result = $result ? $result->toArray() : [];
        $list = [];
        if (is_array($result)) {
            foreach ($result as $val) {
                $info = $this->model->getInfo($val['id']);
                $list[] = $info;
            }
        }

        //获取数据总数
        $count = $this->model->where($map)->count();

        //返回结果
        $message = array(
            "msg" => '操作成功',
            "code" => 0,
            "data" => $list,
            "count" => $count,
        );
        return $message;
    }

    /**
     * 获取记录详情
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function info()
    {
        // 记录ID
        $id = request()->input("id", 0);
        $info = [];
        if ($id) {
            $info = $this->model->getInfo($id);
        }
        return message(MESSAGE_OK, true, $info);
    }

    /**
     * 添加或编辑记录
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        // 获取参数
        $argList = func_get_args();
        // 查询条件
        $data = isset($argList[0]) ? $argList[0] : [];
        // 是否打印SQL
        $is_sql = isset($argList[1]) ? $argList[1] : false;
        if (!$data) {
            $data = request()->all();
        }
        $error = '';
        $rowId = $this->model->edit($data, $error, $is_sql);
        if ($rowId) {
            return message();
        }
        return message($error, false);
    }

    /**
     * 删除记录
     * @return array
     * @since 2020/11/12
     * @author 牧羊人
     */
    public function delete()
    {
        // 参数
        $param = request()->all();
        // 记录ID
        $ids = getter($param, "id");
        if (empty($ids)) {
            return message("记录ID不能为空", false);
        }
        if (is_array($ids)) {
            // 批量删除
            $result = $this->model->deleteAll($ids);
            if (!$result) {
                return message("删除失败", false);
            }
            return message("删除成功");
        } else {
            // 单个删除
            $info = $this->model->getInfo($ids);
            if ($info) {
                $result = $this->model->drop($ids);
                if ($result !== false) {
                    return message();
                }
            }
            return message($this->model->getError(), false);
        }
    }

    /**
     * 设置记录状态
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function setStatus()
    {
        $data = request()->all();
        if (!$data['id']) {
            return message('记录ID不能为空', false);
        }
        if (!$data['status']) {
            return message('记录状态不能为空', false);
        }
        $error = '';
        $rowId = $this->model->edit($data, $error);
        if (!$rowId) {
            return message($error, false);
        }
        return message();
    }

}
