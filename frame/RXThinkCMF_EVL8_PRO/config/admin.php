<?php

/**
 * 后台配置文件
 */
return [

    /**
     * 性别
     */
    'gender_list' => [
        1 => '男',
        2 => '女',
        3 => '未知',
    ],

    /**
     * 菜单类型
     */
    'menu_type' => [
        1 => '模块',
        2 => '导航',
        3 => '菜单',
        4 => '节点',
    ],

    /**
     * 菜单节点
     */
    'menu_func' => [
        1 => '列表',
        5 => '添加',
        10 => '修改',
        15 => '删除',
        20 => '详情',
        25 => '状态',
        30 => '批量删除',
        35 => '添加子级',
        40 => '全部展开',
        45 => '全部折叠',
    ],

    /**
     * 配置类型
     */
    'config_type' => [
        'hidden' => '隐藏',
        'readonly' => '只读文本',
        'number' => '数字',
        'text' => '单行文本',
        'textarea' => '多行文本',
        'array' => '数组',
        'password' => '密码',
        'radio' => '单选框',
        'checkbox' => '复选框',
        'select' => '下拉框',
        'icon' => '字体图标',
        'date' => '日期',
        'datetime' => '时间',
        'image' => '单张图片',
        'images' => '多张图片',
        'file' => '单个文件',
        'files' => '多个文件',
        'ueditor' => '富文本编辑器',
        'json' => 'JSON',
    ],

    /**
     * 友链类型
     */
    'link_type' => [
        1 => '友情链接',
        2 => '合作伙伴',
    ],

    /**
     * 友链形式
     */
    'link_form' => [
        1 => '文字链接',
        2 => '图片链接',
    ],

    /**
     * 友链平台
     */
    'link_platform' => [
        1 => 'PC站',
        2 => 'WAP站',
        3 => '小程序',
        4 => 'APP应用',
    ],

    /**
     * 站点类型
     */
    'item_type' => [
        1 => '普通站点',
        2 => '其他',
    ],

    /**
     * 广告平台
     */
    'ad_platform' => [
        1 => 'PC站',
        2 => 'WAP站',
        3 => '小程序',
        4 => 'APP应用',
    ],

    /**
     * 广告类型
     */
    'ad_type' => [
        1 => '图片',
        2 => '文字',
        3 => '视频',
        4 => '其他',
    ],

    /**
     * 布局推荐类型
     */
    'layout_type' => [
        1 => 'CMS文章',
        2 => '其他',
    ],

    /**
     * 城市级别
     */
    'city_level' => [
        1 => "省份",
        2 => "城市",
        3 => "区县",
    ],

    /**
     * 行为类型
     */
    'action_type' => [
        1 => '模块',
        2 => '插件',
        3 => '主题',
    ],

    /**
     * 执行操作
     */
    'action_execution' => [
        1 => '自定义操作',
        2 => '记录操作',
    ],

    /**
     * 设备类型
     */
    'user_device' => [
        0 => '未知',
        1 => '苹果',
        2 => '安卓',
        3 => 'WAP站',
        4 => 'PC站',
        5 => '微信小程序',
        6 => '后台添加',
    ],

    /**
     * 用户来源
     */
    'user_source' => [
        1 => '注册会员',
        2 => '马甲会员',
    ],

    /**
     * 定时任务类型
     */
    'crontab_type' => [
        1 => '请求URL',
        2 => '执行SQL',
        3 => '执行Shell',
    ],

    /**
     * 通知来源
     */
    'notice_source' => [
        1 => '云平台',
    ],

    /**
     * 通知状态
     */
    'notice_status' => [
        1 => '草稿箱',
        2 => '立即发布',
        3 => '定时发布',
    ],
];
