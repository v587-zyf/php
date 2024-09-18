<?php


namespace App\Models;

/**
 * 菜单管理-模型
 * @author 牧羊人
 * @since 2020/8/29
 * Class MenuModel
 * @package App\Models
 */
class MenuModel extends BaseModel
{
    // 设置数据表
    protected $table = 'menu';

    /**
     * 获取记录信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/9/1
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 菜单类型
            if ($info['type']) {
                $info['type_name'] = config('admin.menu_type')[$info['type']];
            }
        }
        return $info;
    }

    /**
     * 获取子级菜单列表
     * @param int $pid
     * @param bool $isMenu
     * @return array
     * @since 2020/9/1
     * @author 牧羊人
     */
    public function getChilds($pid = 0, $isMenu = true)
    {
        $map = [
            'pid' => $pid,
            'mark' => 1,
        ];
        $result = $this->where($map)->orderBy("sort")->get()->toArray();
        $list = [];
        if ($result) {
            foreach ($result as $val) {
                $id = (int)$val['id'];
                $info = $this->getInfo($id);
                if (!$info) {
                    continue;
                }
                $itemList = $this->getChilds($id, $isMenu);
                $itemList = is_array($itemList) ? $itemList : [];
                if ($info['type'] == 3) {
                    if ($isMenu) {
                        $info['children'] = $itemList;
                    } else {
                        $info['funcList'] = $itemList;
                    }
                } else {
                    $info['children'] = $itemList;
                }
                $list[] = $info;
            }
        }
        return $list;
    }
}
