<?php


namespace App\Models;


use Ramsey\Uuid\Type\Integer;

/**
 * 菜单管理-模型
 * @author 牧羊人
 * @since 2020/11/10
 * Class MenuModel
 * @package App\Models
 */
class MenuModel extends BaseModel
{
    // 设置数据表
    protected $table = 'menu';


    /**
     * 获取子级菜单列表
     * @param $pid 父级ID
     * @return mixed
     * @author 牧羊人
     * @since 2020/11/11
     */
    public function getChilds($pid)
    {
        // 查询条件
        $map = [];
        // 父级ID
        $map[] = ['pid', '=', $pid];
        // 菜单状态
        $map[] = ['status', '=', 1];
        // 只取菜单
        $map[] = ['type', '=', 0];
        // 有效标识
        $map[] = ['mark', '=', 1];

        $list = $this->where($map)->orderBy("sort", "asc")->get()->toArray();
        if (!empty($list)) {
            foreach ($list as &$val) {
                $val['children'] = $this->getChilds($val['id']);
            }
        }
        return $list;
    }

}
