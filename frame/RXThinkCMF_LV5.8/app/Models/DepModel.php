<?php


namespace App\Models;

/**
 * 部门管理-模型
 * @author 牧羊人
 * @since 2020/8/28
 * Class DepModel
 * @package App\Models
 */
class DepModel extends BaseModel
{
    // 设置数据表
    protected $table = "dep";

    /**
     * 获取子级城市列表
     * @param int $pid
     * @param bool $flag
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getChilds($pid = 0, $flag = false)
    {
        $list = [];
        $map = [
            'pid' => $pid,
            'mark' => 1,
        ];
        $result = $this->where($map)->orderBy("sort")->get()->toArray();
        if ($result) {
            foreach ($result as $val) {
                $id = (int)$val['id'];
                $info = $this->getInfo($id);
                if (!$info) {
                    continue;
                }
                if ($flag) {
                    $childList = $this->getChilds($id, $flag);
                    $info['children'] = $childList;
                }
                $list[] = $info;
            }
        }
        return $list;
    }
}
