<?php

use App\Http\Controllers\ActionLogController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdSortController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ConfigGroupController;
use App\Http\Controllers\DeptController;
use App\Http\Controllers\DictController;
use App\Http\Controllers\DictTypeController;
use App\Http\Controllers\GenerateController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ItemCateController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LayoutDescController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginLogController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberLevelController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

// 上传文件
Route::post('/upload/uploadImage', [UploadController::class, 'uploadImage']);

// 系统登录
Route::get('/captcha', [LoginController::class, 'captcha'])->name('captcha');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// 系统主页
Route::get('/index/getMenuList', [IndexController::class, 'getMenuList']);
Route::get('/index/getUserInfo', [IndexController::class, 'getUserInfo']);
Route::post('/index/updateUserInfo', [IndexController::class, 'updateUserInfo']);
Route::post('/index/updatePwd', [IndexController::class, 'updatePwd']);

// 用户管理
Route::get('/user/index', [UserController::class, 'index']);
Route::get('/user/info', [UserController::class, 'info']);
Route::post('/user/edit', [UserController::class, 'edit']);
Route::post('/user/delete', [UserController::class, 'delete']);
Route::post('/user/resetPwd', [UserController::class, 'resetPwd']);

// 职级管理
Route::get('/level/index', [LevelController::class, 'index']);
Route::get('/level/info', [LevelController::class, 'info']);
Route::post('/level/edit', [LevelController::class, 'edit']);
Route::post('/level/delete', [LevelController::class, 'delete']);
Route::get('/level/getLevelList', [LevelController::class, 'getLevelList']);

// 岗位管理
Route::get('/position/index', [PositionController::class, 'index']);
Route::get('/position/info', [PositionController::class, 'info']);
Route::post('/position/edit', [PositionController::class, 'edit']);
Route::post('/position/delete', [PositionController::class, 'delete']);
Route::get('/position/getPositionList', [PositionController::class, 'getPositionList']);

// 角色管理
Route::get('/role/index', [RoleController::class, 'index']);
Route::get('/role/info', [RoleController::class, 'info']);
Route::post('/role/edit', [RoleController::class, 'edit']);
Route::post('/role/delete', [RoleController::class, 'delete']);
Route::get('/role/getRoleList', [RoleController::class, 'getRoleList']);
Route::get('/role/getPermissionList', [RoleController::class, 'getPermissionList']);
Route::post('/role/savePermission', [RoleController::class, 'savePermission']);

// 菜单管理
Route::get('/menu/index', [MenuController::class, 'index']);
Route::get('/menu/info', [MenuController::class, 'info']);
Route::post('/menu/edit', [MenuController::class, 'edit']);
Route::post('/menu/delete', [MenuController::class, 'delete']);

// 部门管理
Route::get('/dept/index', [DeptController::class, 'index']);
Route::get('/dept/info', [DeptController::class, 'info']);
Route::post('/dept/edit', [DeptController::class, 'edit']);
Route::post('/dept/delete', [DeptController::class, 'delete']);

// 部门管理
Route::get('/city/index', [CityController::class, 'index']);
Route::get('/city/info', [CityController::class, 'info']);
Route::post('/city/edit', [CityController::class, 'edit']);
Route::post('/city/delete', [CityController::class, 'delete']);

// 字典类型管理
Route::get('/dicttype/index', [DictTypeController::class, 'index']);
Route::get('/dicttype/info', [DictTypeController::class, 'info']);
Route::post('/dicttype/edit', [DictTypeController::class, 'edit']);
Route::post('/dicttype/delete', [DictTypeController::class, 'delete']);

// 字典管理
Route::get('/dict/index', [DictController::class, 'index']);
Route::get('/dict/info', [DictController::class, 'info']);
Route::post('/dict/edit', [DictController::class, 'edit']);
Route::post('/dict/delete', [DictController::class, 'delete']);

// 配置分组管理
Route::get('/configgroup/index', [ConfigGroupController::class, 'index']);
Route::get('/configgroup/info', [ConfigGroupController::class, 'info']);
Route::post('/configgroup/edit', [ConfigGroupController::class, 'edit']);
Route::post('/configgroup/delete', [ConfigGroupController::class, 'delete']);

// 配置管理
Route::get('/config/index', [ConfigController::class, 'index']);
Route::get('/config/info', [ConfigController::class, 'info']);
Route::post('/config/edit', [ConfigController::class, 'edit']);
Route::post('/config/delete', [ConfigController::class, 'delete']);

// 通知公告管理
Route::get('/notice/index', [NoticeController::class, 'index']);
Route::get('/notice/info', [NoticeController::class, 'info']);
Route::post('/notice/edit', [NoticeController::class, 'edit']);
Route::post('/notice/delete', [NoticeController::class, 'delete']);
Route::post('/notice/status', [NoticeController::class, 'status']);
Route::post('/notice/setIsTop', [NoticeController::class, 'setIsTop']);

// 站点管理
Route::get('/item/index', [ItemController::class, 'index']);
Route::get('/item/info', [ItemController::class, 'info']);
Route::post('/item/edit', [ItemController::class, 'edit']);
Route::post('/item/delete', [ItemController::class, 'delete']);
Route::post('/item/status', [ItemController::class, 'status']);
Route::get('/item/getItemList', [ItemController::class, 'getItemList']);

// 栏目管理
Route::get('/itemcate/index', [ItemCateController::class, 'index']);
Route::get('/itemcate/info', [ItemCateController::class, 'info']);
Route::post('/itemcate/edit', [ItemCateController::class, 'edit']);
Route::post('/itemcate/delete', [ItemCateController::class, 'delete']);
Route::post('/itemcate/status', [ItemCateController::class, 'status']);

// 广告位管理
Route::get('/adsort/index', [AdSortController::class, 'index']);
Route::get('/adsort/info', [AdSortController::class, 'info']);
Route::post('/adsort/edit', [AdSortController::class, 'edit']);
Route::post('/adsort/delete', [AdSortController::class, 'delete']);
Route::get('/adsort/getAdSortList', [AdSortController::class, 'getAdSortList']);

// 广告管理
Route::get('/ad/index', [AdController::class, 'index']);
Route::get('/ad/info', [AdController::class, 'info']);
Route::post('/ad/edit', [AdController::class, 'edit']);
Route::post('/ad/delete', [AdController::class, 'delete']);

// 布局描述
Route::get('/layoutdesc/index', [LayoutDescController::class, 'index']);
Route::get('/layoutdesc/info', [LayoutDescController::class, 'info']);
Route::post('/layoutdesc/edit', [LayoutDescController::class, 'edit']);
Route::post('/layoutdesc/delete', [LayoutDescController::class, 'delete']);

// 布局管理
Route::get('/layout/index', [LayoutController::class, 'index']);
Route::get('/layout/info', [LayoutController::class, 'info']);
Route::post('/layout/edit', [LayoutController::class, 'edit']);
Route::post('/layout/delete', [LayoutController::class, 'delete']);

// 友链管理
Route::get('/link/index', [LinkController::class, 'index']);
Route::get('/link/info', [LinkController::class, 'info']);
Route::post('/link/edit', [LinkController::class, 'edit']);
Route::post('/link/delete', [LinkController::class, 'delete']);

// 会员等级
Route::get('/memberlevel/index', [MemberLevelController::class, 'index']);
Route::get('/memberlevel/info', [MemberLevelController::class, 'info']);
Route::post('/memberlevel/edit', [MemberLevelController::class, 'edit']);
Route::post('/memberlevel/delete', [MemberLevelController::class, 'delete']);
Route::get('/memberlevel/getMemberLevelList', [MemberLevelController::class, 'getMemberLevelList']);

// 会员管理
Route::get('/member/index', [MemberController::class, 'index']);
Route::get('/member/info', [MemberController::class, 'info']);
Route::post('/member/edit', [MemberController::class, 'edit']);
Route::post('/member/delete', [MemberController::class, 'delete']);
Route::post('/member/status', [MemberController::class, 'status']);

// 登录日志
Route::get('/loginlog/index', [LoginLogController::class, 'index']);
Route::post('/loginlog/delete', [LoginLogController::class, 'delete']);

// 操作日志
Route::get('/actionlog/index', [ActionLogController::class, 'index']);
Route::post('/actionlog/delete', [ActionLogController::class, 'delete']);

// 代码生成器
Route::get('/generate/index', [GenerateController::class, 'index']);
Route::post('/generate/generate', [GenerateController::class, 'generate']);

