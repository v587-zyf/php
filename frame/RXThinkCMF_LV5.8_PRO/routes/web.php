<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 登录
Route::get('login/login', "LoginController@login");
Route::post('login/login', "LoginController@login");
Route::get('login/logout', "LoginController@logout");

// 后台主页
Route::get('/', 'IndexController@index');
Route::get('index/index', "IndexController@index");
Route::get('index/main', "IndexController@main");
Route::get('index/userinfo', "IndexController@userInfo");
Route::post('index/userinfo', "IndexController@userInfo");
Route::post('index/updatePwd', "IndexController@updatePwd");

// 职级
Route::get('level/index', "LevelController@index");
Route::post('level/index', "LevelController@index");
Route::get('level/edit', "LevelController@edit");
Route::post('level/edit', "LevelController@edit");
Route::post('level/drop', "LevelController@drop");
Route::post('level/batchDrop', "LevelController@batchDrop");
Route::post('level/setStatus', "LevelController@setStatus");

// 岗位
Route::get('position/index', "PositionController@index");
Route::post('position/index', "PositionController@index");
Route::get('position/edit', "PositionController@edit");
Route::post('position/edit', "PositionController@edit");
Route::post('position/drop', "PositionController@drop");
Route::post('position/batchDrop', "PositionController@batchDrop");

// 角色
Route::get('role/index', "RoleController@index");
Route::post('role/index', "RoleController@index");
Route::get('role/edit', "RoleController@edit");
Route::post('role/edit', "RoleController@edit");
Route::post('role/drop', "RoleController@drop");
Route::post('role/batchDrop', "RoleController@batchDrop");

// 菜单管理
Route::get('menu/index', "MenuController@index");
Route::post('menu/index', "MenuController@index");
Route::get('menu/edit', "MenuController@edit");
Route::post('menu/edit', "MenuController@edit");
Route::post('menu/drop', "MenuController@drop");

// 菜单权限
Route::get('adminrom/index', "AdminRomController@index");
Route::post('adminrom/setPermission', "AdminRomController@setPermission");

// 人员管理
Route::get('admin/index', "AdminController@index");
Route::post('admin/index', "AdminController@index");
Route::get('admin/edit', "AdminController@edit");
Route::post('admin/edit', "AdminController@edit");
Route::post('admin/drop', "AdminController@drop");
Route::post('admin/batchDrop', "AdminController@batchDrop");
Route::post('admin/resetPwd', "AdminController@resetPwd");

Route::get('adminlog/index', "AdminLogController@index");
Route::post('adminlog/index', "AdminLogController@index");
Route::post('adminlog/drop', "AdminLogController@drop");
Route::post('adminlog/batchDrop', "AdminLogController@batchDrop");

// 部门
Route::get('dep/index', "DepController@index");
Route::post('dep/index', "DepController@index");
Route::get('dep/edit', "DepController@edit");
Route::post('dep/edit', "DepController@edit");
Route::post('dep/drop', "DepController@drop");
Route::post('dep/batchDrop', "DepController@batchDrop");

// 会员管理
Route::get('user/index', "UserController@index");
Route::post('user/index', "UserController@index");
Route::get('user/edit', "UserController@edit");
Route::post('user/edit', "UserController@edit");
Route::post('user/drop', "UserController@drop");
Route::post('user/batchDrop', "UserController@batchDrop");
Route::post('user/setStatus', "UserController@setStatus");

// 会员等级
Route::get('userlevel/index', "UserLevelController@index");
Route::post('userlevel/index', "UserLevelController@index");
Route::get('userlevel/edit', "UserLevelController@edit");
Route::post('userlevel/edit', "UserLevelController@edit");
Route::post('userlevel/drop', "UserLevelController@drop");
Route::post('userlevel/batchDrop', "UserLevelController@batchDrop");

// 友链管理
Route::get('link/index', "LinkController@index");
Route::post('link/index', "LinkController@index");
Route::get('link/edit', "LinkController@edit");
Route::post('link/edit', "LinkController@edit");
Route::post('link/drop', "LinkController@drop");
Route::post('link/batchDrop', "LinkController@batchDrop");

// 文件上传
Route::post('upload/uploadImage', "UploadController@uploadImage");

// 字典类型
Route::get('dictype/index', "DicTypeController@index");
Route::post('dictype/index', "DicTypeController@index");
Route::get('dictype/edit', "DicTypeController@edit");
Route::post('dictype/edit', "DicTypeController@edit");
Route::post('dictype/drop', "DicTypeController@drop");
Route::post('dictype/batchDrop', "DicTypeController@batchDrop");

// 字典管理
Route::get('dic/index', "DicController@index");
Route::post('dic/index', "DicController@index");
Route::get('dic/edit', "DicController@edit");
Route::post('dic/edit', "DicController@edit");
Route::post('dic/drop', "DicController@drop");
Route::post('dic/batchDrop', "DicController@batchDrop");

// 配置分组
Route::get('configgroup/index', "ConfigGroupController@index");
Route::post('configgroup/index', "ConfigGroupController@index");
Route::get('configgroup/edit', "ConfigGroupController@edit");
Route::post('configgroup/edit', "ConfigGroupController@edit");
Route::post('configgroup/drop', "ConfigGroupController@drop");
Route::post('configgroup/batchDrop', "ConfigGroupController@batchDrop");

// 配置管理
Route::get('config/index', "ConfigController@index");
Route::post('config/index', "ConfigController@index");
Route::get('config/edit', "ConfigController@edit");
Route::post('config/edit', "ConfigController@edit");
Route::post('config/drop', "ConfigController@drop");
Route::post('config/batchDrop', "ConfigController@batchDrop");

Route::get('configweb/index', "ConfigWebController@index");
Route::post('configweb/index', "ConfigWebController@index");

// 站点管理
Route::get('item/index', "ItemController@index");
Route::post('item/index', "ItemController@index");
Route::get('item/edit', "ItemController@edit");
Route::post('item/edit', "ItemController@edit");
Route::post('item/drop', "ItemController@drop");
Route::post('item/batchDrop', "ItemController@batchDrop");

// 栏目管理
Route::get('itemcate/index', "ItemCateController@index");
Route::post('itemcate/index', "ItemCateController@index");
Route::get('itemcate/edit', "ItemCateController@edit");
Route::post('itemcate/edit', "ItemCateController@edit");
Route::post('itemcate/edit', "ItemCateController@edit");
Route::post('itemcate/drop', "ItemCateController@drop");
Route::post('itemcate/batchDrop', "ItemCateController@batchDrop");
Route::post('itemcate/getCateList', "ItemCateController@getCateList");

// 广告位管理
Route::get('adsort/index', "AdSortController@index");
Route::post('adsort/index', "AdSortController@index");
Route::get('adsort/edit', "AdSortController@edit");
Route::post('adsort/edit', "AdSortController@edit");
Route::post('adsort/drop', "AdSortController@drop");
Route::post('adsort/batchDrop', "AdSortController@batchDrop");

// 广告管理
Route::get('ad/index', "AdController@index");
Route::post('ad/index', "AdController@index");
Route::get('ad/edit', "AdController@edit");
Route::post('ad/edit', "AdController@edit");
Route::post('ad/drop', "AdController@drop");
Route::post('ad/batchDrop', "AdController@batchDrop");

// 布局描述
Route::get('layoutdesc/index', "LayoutDescController@index");
Route::post('layoutdesc/index', "LayoutDescController@index");
Route::get('layoutdesc/edit', "LayoutDescController@edit");
Route::post('layoutdesc/edit', "LayoutDescController@edit");
Route::post('layoutdesc/drop', "LayoutDescController@drop");
Route::post('layoutdesc/batchDrop', "LayoutDescController@batchDrop");
Route::post('layoutdesc/getLayoutDescList', "LayoutDescController@getLayoutDescList");

// 布局管理
Route::get('layout/index', "LayoutController@index");
Route::post('layout/index', "LayoutController@index");
Route::get('layout/edit', "LayoutController@edit");
Route::post('layout/edit', "LayoutController@edit");
Route::post('layout/drop', "LayoutController@drop");
Route::post('layout/batchDrop', "LayoutController@batchDrop");

// 通知公告
Route::get('notice/index', "NoticeController@index");
Route::post('notice/index', "NoticeController@index");
Route::get('notice/edit', "NoticeController@edit");
Route::post('notice/edit', "NoticeController@edit");
Route::post('notice/drop', "NoticeController@drop");
Route::post('notice/batchDrop', "NoticeController@batchDrop");

// 定时任务
Route::get('crontab/index', "CrontabController@index");
Route::post('crontab/index', "CrontabController@index");
Route::get('crontab/edit', "CrontabController@edit");
Route::post('crontab/edit', "CrontabController@edit");
Route::post('crontab/drop', "CrontabController@drop");
Route::post('crontab/batchDrop', "CrontabController@batchDrop");

// 城市管理
Route::get('city/index', "CityController@index");
Route::post('city/index', "CityController@index");
Route::get('city/edit', "CityController@edit");
Route::post('city/edit', "CityController@edit");
Route::post('city/drop', "CityController@drop");
Route::post('city/batchDrop', "CityController@batchDrop");
Route::post('city/getChilds', "CityController@getChilds");

// CMS管理
Route::get('article/index', "ArticleController@index");
Route::post('article/index', "ArticleController@index");
Route::get('article/edit', "ArticleController@edit");
Route::post('article/edit', "ArticleController@edit");
Route::post('article/drop', "ArticleController@drop");
Route::post('article/batchDrop', "ArticleController@batchDrop");

// 行为日志
Route::get('action/index', "ActionController@index");
Route::post('action/index', "ActionController@index");
Route::get('action/edit', "ActionController@edit");
Route::post('action/edit', "ActionController@edit");
Route::post('action/drop', "ActionController@drop");
Route::post('action/batchDrop', "ActionController@batchDrop");

// 行为日志记录
Route::get('actionlog/index', "ActionLogController@index");
Route::post('actionlog/index', "ActionLogController@index");
Route::post('actionlog/drop', "ActionLogController@drop");
Route::post('actionlog/batchDrop', "ActionLogController@batchDrop");

Route::get('database/index', "DatabaseController@index");
Route::post('database/index', "DatabaseController@index");

// 统计报表
Route::get('statistics/index', "StatisticsController@index");

// 代码生成器
Route::get('generate/index', "GenerateController@index");
Route::post('generate/index', "GenerateController@index");
Route::post('generate/generate', "GenerateController@generate");

// 演示案例
Route::get('demo/index', "DemoController@index");
Route::post('demo/index', "DemoController@index");
Route::get('demo/edit', "DemoController@edit");
Route::post('demo/edit', "DemoController@edit");
Route::post('demo/drop', "DemoController@drop");
Route::post('demo/batchDrop', "DemoController@batchDrop");
Route::post('demo/setStatus', "DemoController@setStatus");


