<?php


namespace App\Services;

use App\Models\ItemCateModel;

/**
 * 栏目管理-服务类
 * @author 牧羊人
 * @since 2020/11/11
 * Class ItemCateService
 * @package App\Services
 */
class ItemCateService extends BaseService
{
    /**
     * 构造函数
     * @author 牧羊人
     * @since 2020/11/11
     * ItemCateService constructor.
     */
    public function __construct()
    {
        $this->model = new ItemCateModel();
    }

    /**
     * 获取栏目列表
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function getList()
    {
        $param = request()->all();

        // 查询条件
        $map = [];
        // 上级ID
        $pid = intval(getter($param, 'pid', 0));
        if (!$pid) {
            $map[] = ['pid', '=', 0];
        } else {
            $map[] = ['pid', '=', $pid];
        }
        $list = $this->model->getList($map, [['sort', 'asc']]);
        if (!empty($list)) {
            foreach ($list as &$val) {
                if ($val['pid'] == 0) {
                    $val['hasChildren'] = true;
                }
            }
        }
        return message("操作成功", true, $list);
    }

    /**
     * 添加或编辑
     * @return array
     * @since 2020/11/11
     * @author 牧羊人
     */
    public function edit()
    {
        // 参数
        $data = request()->all();
        // 封面地址
        $cover = trim($data['cover']);
        if (!$data['id'] && !$cover) {
            return message('请上传栏目封面', false);
        }
        if (strpos($cover, "temp")) {
            $data['cover'] = save_image($cover, 'itemcate');
        } else {
            $data['cover'] = str_replace(IMG_URL, "", $data['cover']);
        }
        return parent::edit($data); // TODO: Change the autogenerated stub
    }

}
