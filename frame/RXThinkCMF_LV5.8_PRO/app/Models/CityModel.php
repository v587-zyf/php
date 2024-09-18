<?php


namespace App\Models;

/**
 * 城市管理-模型
 * @author 牧羊人
 * @since 2020/8/28
 * Class CityModel
 * @package App\Models
 */
class CityModel extends BaseModel
{
    // 设置数据表
    protected $table = "city";

    /**
     * 获取子级城市
     * @param $pid 上级ID
     * @param bool $flag 是否获取子级
     * @return array
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function getChilds($pid, $flag = false)
    {
        $list = [];
        $result = $this->where([
            'pid' => $pid,
            'mark' => 1
        ])->orderBy("id")->get()->toArray();
        if ($result) {
            foreach ($result as $val) {
                $id = (int)$val['id'];
                $info = $this->getInfo($id);
                if ($flag) {
                    $childList = $this->getChilds($id, $flag);
                    if (is_array($childList)) {
                        $info['children'] = $childList;
                    }
                }
                if ($flag) {
                    $list[] = $info;
                } else {
                    $list[$id] = $info;
                }
            }
        }
        return $list;
    }

    /**
     * 获取城市名称
     * @param $cityId 城市ID
     * @param string $delimiter 分隔字符
     * @param bool $isReplace 是否替换关键词
     * @return string
     * @author 牧羊人
     * @since 2020/8/28
     */
    public function getCityName($cityId, $delimiter = "", $isReplace = false)
    {
        do {
            $info = $this->getInfo($cityId);
            if ($info) {
                if ($isReplace) {
                    $names[] = str_replace(array("省", "市", "维吾尔", "壮族", "回族", "自治区"), "", $info['name']);
                } else {
                    $names[] = $info['name'];
                }
            }
            $cityId = isset($info['pid']) ? (int)$info['pid'] : 0;
        } while ($cityId > 1);
        $names = array_reverse($names);
//        if (strpos($names[1], $names[0]) === 0) {
//            unset($names[0]);
//        }
        return implode($delimiter, $names);
    }
}
