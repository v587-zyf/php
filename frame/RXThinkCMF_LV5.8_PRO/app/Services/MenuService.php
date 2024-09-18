<?php


namespace App\Services;

use App\Models\MenuModel;

/**
 * 菜单管理-服务类
 * @author 牧羊人
 * @since 2020/9/1
 * Class MenuService
 * @package App\Services
 */
class MenuService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/9/1
     * MenuService constructor.
     */
    public function __construct()
    {
        $this->model = new MenuModel();
    }

    /**
     * 获取数据列表
     * @return array
     * @since 2020/9/1
     * @author 牧羊人
     */
    public function getList()
    {
        $list = $this->model->getList([], [['id', 'asc']]);
        if ($list) {
            foreach ($list as &$val) {
                if (intval($val['type']) <= 2) {
                    $val['open'] = true;
                } else {
                    $val['open'] = false;
                }
            }
        }
        return message("操作成功", true, $list);
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/9/1
     * @author 牧羊人
     */
    public function edit()
    {
        // 请求参数
        $data = request()->all();
        $result = $this->model->edit($data);
        if (!$result) {
            return message("操作失败", false);
        }

        // 上级菜单设置隐藏和显示，默认同步更新子级菜单
        $menuList = $this->model->getChilds($result, true);
        foreach ($menuList as $val) {
            // 设置状态值
            $menuModel = new MenuModel();
            $v = [
                'id' => $val['id'],
                'status' => $data['status'],
                'is_public' => $data['is_public'],
            ];
            $menuModel->edit($v);

            // 获取子级
            $children = $val['children'];
            if (is_array($children) && !empty($children)) {
                foreach ($children as $vt) {
                    $item = [
                        'id' => $vt['id'],
                        'status' => $data['status'],
                        'is_public' => $data['is_public'],
                    ];
                    $menuModel = new MenuModel();
                    $menuModel->edit($item);

                    // 更新子级菜单
                    $children2 = $vt['children'];
                    foreach ($children2 as $vo) {
                        $subItem = [
                            'id' => $vo['id'],
                            'status' => $data['status'],
                            'is_public' => $data['is_public'],
                        ];
                        $menuModel = new MenuModel();
                        $menuModel->edit($subItem);
                    }
                }
            }
        }

        // 节点参数
        $func = isset($data['func']) ? $data['func'] : "";
        // URL地址
        $url = trim($data['url']);
        if ($data['type'] == 3 && $func && $url) {
            $item = explode("/", $url);
            if (count($item) == 3) {
                // 模块名
                $module = $item[1];
                $funcList = explode(",", $func);
                foreach ($funcList as $val) {
                    $data = [];
                    if ($val == 1) {
                        // 列表
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "列表"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "列表",
                            'url' => "/{$module}/list",
                            'permission' => "sys:{$module}:list",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 5) {
                        // 添加
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "添加"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "添加",
                            'url' => "/{$module}/edit",
                            'permission' => "sys:{$module}:add",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 10) {
                        // 修改
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "修改"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "修改",
                            'url' => "/{$module}/edit",
                            'permission' => "sys:{$module}:edit",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 15) {
                        // 删除
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "删除"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "删除",
                            'url' => "/{$module}/drop",
                            'permission' => "sys:{$module}:drop",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 20) {
                        // 详情
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "详情"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "详情",
                            'url' => "/{$module}/detail",
                            'permission' => "sys:{$module}:detail",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 25) {
                        // 状态
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "状态"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "状态",
                            'url' => "/{$module}/setStatus",
                            'permission' => "sys:{$module}:status",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 30) {
                        // 批量删除
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "批量删除"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "批量删除",
                            'url' => "/{$module}/batchDrop",
                            'permission' => "sys:{$module}:batchDrop",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 35) {
                        // 添加子级
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "添加子级"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "添加子级",
                            'url' => "/{$module}/addz",
                            'permission' => "sys:{$module}:addz",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 40) {
                        // 全部展开
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "全部展开"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "全部展开",
                            'url' => "/{$module}/expand",
                            'permission' => "sys:{$module}:expand",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    } else if ($val == 45) {
                        // 全部展开
                        $menuModel = new MenuModel();
                        $funcInfo = $menuModel->getOne([
                            ['pid', '=', $result],
                            ['name', '=', "全部折叠"]
                        ]);
                        $data = [
                            'id' => isset($funcInfo['id']) ? intval($funcInfo['id']) : 0,
                            'name' => "全部折叠",
                            'url' => "/{$module}/collapse",
                            'permission' => "sys:{$module}:collapse",
                            'pid' => $result,
                            'type' => 4,
                            'status' => 1,
                            'is_public' => 2,
                            'sort' => $val,
                        ];
                    }
                    $menuModel = new MenuModel();
                    $menuModel->edit($data);
                }
            }
        }
        return message();
    }
}
