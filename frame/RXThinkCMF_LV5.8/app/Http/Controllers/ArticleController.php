<?php


namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Services\ArticleService;
use Illuminate\Http\Request;

/**
 * CMS管理-控制器
 * @author 牧羊人
 * @since 2020/8/30
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Backend
{
    /**
     * 构造函数
     * @param Request $request
     * @since 2020/8/30
     * ArticleController constructor.
     * @author 牧羊人
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new ArticleModel();
        $this->service = new ArticleService();
    }
}
