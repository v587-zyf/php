<?php


namespace App\Http\Controllers;

use App\Models\DepModel;
use App\Services\DepService;
use Illuminate\Http\Request;

/**
 * 部门管理-控制器
 * @author 牧羊人
 * @since 2020/8/28
 * Class DepController
 * @package App\Http\Controllers
 */
class DepController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/28
     * DepController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new DepModel();
        $this->service = new DepService();
    }
}
