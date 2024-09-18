<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 数据库管理
 * @author 牧羊人
 * @since 2020/8/30
 * Class DatabaseController
 * @package App\Http\Controllers
 */
class DatabaseController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * DatabaseController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * 获取数据列表
     * @return view|array|mixed
     * @since 2020/8/30
     * @author 牧羊人
     */
    public function index()
    {
        if (IS_POST) {
            $list = DB::select('SHOW TABLE STATUS');
            $list = json_decode(json_encode($list), true);
            $list = array_map('array_change_key_case', $list);
            $title = '数据备份';

            return $message = array(
                "msg" => '操作成功',
                "code" => 0,
                "data" => $list,
                "count" => 10,
            );
        }
        return $this->render();
    }
}
