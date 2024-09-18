<?php


namespace App\Models;

/**
 * 栏目管理-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class ItemCateModel
 * @package App\Models
 */
class ItemCateModel extends BaseModel
{
    // 设置数据表
    protected $table = "item_cate";

    /**
     * 获取缓存信息
     * @param int $id
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 栏目封面
            if ($info['cover']) {
                $info['cover_url'] = get_image_url($info['cover']);
            }

            // 上级栏目
            if ($info['pid']) {
                $parent_info = $this->getInfo($info['pid']);
                $info['parent_name'] = $parent_info['name'];
            }

            // 获取站点
            if ($info['item_id']) {
                $itemModel = new ItemModel();
                $itemInfo = $itemModel->getInfo($info['item_id']);
                $info['item_name'] = $itemInfo['name'];
            }
        }
        return $info;
    }

    /**
     * 获取子级栏目
     * @param int $itemId
     * @param int $pid
     * @param bool $flag
     * @return array
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getChilds($itemId = 0, $pid = 0, $flag = false)
    {
        $map = [
            'pid' => $pid,
            'mark' => 1,
        ];
        if ($itemId) {
            $map['item_id'] = $itemId;
        }
        $list = [];
        $result = $this->where($map)->orderBy("sort")->get()->toArray();
        if ($result) {
            foreach ($result as $val) {
                $info = $this->getInfo($val['id']);
                if (!$info) {
                    continue;
                }
                if ($flag) {
                    $childList = $this->getChilds($itemId, $val['id'], 0);
                    $info['children'] = $childList;
                }
                $list[] = $info;
            }
        }
        return $list;
    }

    /**
     * 获取栏目名称
     * @param $cateId 栏目ID
     * @param string $delimiter 分隔符
     * @return string|null
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getCateName($cateId, $delimiter = "")
    {
        do {
            $info = $this->getInfo($cateId);
            $names[] = $info['name'];
            $cateId = $info['pid'];
        } while ($cateId > 0);
        if (!empty($names)) {
            $names = array_reverse($names);
            if (count($names) >= 2) {
                if (strpos($names[1], $names[0]) === 0) {
                    unset($names[0]);
                }
            }
            return implode($delimiter, $names);
        }
        return null;
    }
}
