<?php


namespace App\Http\Controllers;


use App\Models\ConfigGroupModel;
use App\Models\ConfigModel;
use App\Services\ConfigWebService;
use Illuminate\Http\Request;

/**
 * 网站配置-控制器
 * @author 牧羊人
 * @since 2020/9/1
 * Class ConfigWebController
 * @package App\Http\Controllers
 */
class ConfigWebController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/9/1
     * ConfigWebController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ConfigModel();
        $this->service = new ConfigWebService();
    }

    public function index()
    {
        if (IS_POST) {
            $result = $this->service->config();
            return $result;
        }
        // 配置分组ID
        $groupId = request()->input('group_id', 1);

        // 获取配置分组
        $configGroupModel = new ConfigGroupModel();
        $configGroupList = $configGroupModel->where(['mark' => 1])->get()->toArray();
        view()->share("configGroupList", $configGroupList);

        // 获取元素列表
        $list = $this->model->getList([
            ['group_id', '=', $groupId],
            ['status', '=', 1],
        ], [['id', 'asc']]);
        if ($list) {
            foreach ($list as &$val) {
                if ($val['type'] == 'checkbox') {
                    // 复选框
                    $val['format_name'] = "{$val['name']}__checkbox|name|id";

                    // 组件数据源
                    $optionsList = [];
                    if ($val['options']) {
                        $options = preg_split("/[\r\n]/", $val['options']);
                        if ($options && is_array($options)) {
                            foreach ($options as $v) {
                                $item = explode(':', $v);
                                $optionsList[] = [
                                    'id' => $item[0],
                                    'name' => $item[1],
                                ];
                            }
                        }
                    }
                    $val['format_options'] = $optionsList;

                    // 选中的值
                    if ($val['value']) {
                        $val['format_value'] = explode(',', $val['value']);
                    }
                } else if ($val['type'] == 'radio') {
                    // 单选
                    $val['format_name'] = "{$val['name']}|name|id";

                    // 组件数据源
                    $optionsList = [];
                    if ($val['options']) {
                        $options = preg_split("/[\r\n]/", $val['options']);
                        if ($options && is_array($options)) {
                            foreach ($options as $v) {
                                $item = explode(':', $v);
                                $optionsList[] = [
                                    'id' => $item[0],
                                    'name' => $item[1],
                                ];
                            }
                        }
                    }
                    $val['format_options'] = $optionsList;
                } else if ($val['type'] == 'select') {
                    // 下拉选择
                    $val['format_name'] = "{$val['name']}|1|{$val['title']}|name|id";

                    // 组件数据源
                    $optionsList = [];
                    if ($val['options']) {
                        $options = preg_split("/[\r\n]/", $val['options']);
                        if ($options && is_array($options)) {
                            foreach ($options as $v) {
                                $item = explode(':', $v);
                                $optionsList[] = [
                                    'id' => $item[0],
                                    'name' => $item[1],
                                ];
                            }
                        }
                    }
                    $val['format_options'] = $optionsList;
                } else if ($val['type'] == 'image') {
                    // 单图处理
                    $val['value'] = get_image_url($val['value']);
                } else if ($val['type'] == 'images') {
                    // 图集
                    $imgsList = $val['value'] ? unserialize($val['value']) : [];
                    if (!empty($imgsList)) {
                        foreach ($imgsList as &$vo) {
                            $vo = get_image_url($vo);
                        }
                    }
                    $val['value'] = $imgsList;
                }
            }
        }
        // 渲染数据
        view()->share("list", $list);
        return view("configweb.index", ['group_id' => $groupId]);
    }
}
