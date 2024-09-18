<?php


namespace App\Http\Controllers;


use App\Models\MenuModel;
use App\Services\MenuService;
use Illuminate\Http\Request;

/**
 * 菜单管理-控制器
 * @author 牧羊人
 * @since 2020/9/1
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/9/1
     * MenuController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new MenuModel();
        $this->service = new MenuService();
    }

    /**
     * 添加或编辑
     * @param Request $request
     * @return view
     * @author 牧羊人
     * @since 2020/9/1
     */
    public function edit()
    {
        // 获取上级菜单列表
        $result = $this->model->getChilds(0, false);
        $menuList = array();
        if ($result) {
            foreach ($result as $val) {
                $key = (int)$val['id'];
                $menuList[$key] = $val;
                $vlist = isset($val['children']) ? $val['children'] : [];
                if ($vlist) {
                    foreach ($vlist as &$v) {
                        $k = (int)$v['id'];
                        $v['name'] = "|--" . $v['name'];
                        $menuList[$k] = $v;
                        $clist = isset($v['children']) ? $v['children'] : [];
                        if ($clist) {
                            foreach ($clist as &$vt) {
                                $kt = (int)$vt['id'];
                                $vt['name'] = "|--|--" . $vt['name'];
                                $menuList[$kt] = $vt;
                            }
                        }
                    }
                }
            }
        }

        // 渲染上级菜单列表
        view()->share("menuList", $menuList);

        // 上级ID
        $pid = request()->input("pid", 0);
        return parent::edit([
            'pid' => $pid
        ]);
    }

}
