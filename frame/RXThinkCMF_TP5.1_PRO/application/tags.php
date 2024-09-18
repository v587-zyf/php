<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 南京RXThinkCMF研发中心
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <1175401194@qq.com>
// +----------------------------------------------------------------------

// 应用行为扩展定义文件

// 行为路径
$behavior_path = 'app\\common\\behavior\\';

return [
    // 应用初始化
    'app_init'     => [
        $behavior_path . 'InitApp', // 初始化应用
    ],
    // 应用开始
    'app_begin'    => [
        $behavior_path . 'InitHook', // 注册钩子行为
    ],
    // 模块初始化
    'module_init'  => [
        $behavior_path . 'InitBase', // 初始化配置行为
    ],
    // 操作开始执行
    'action_begin' => [],
    // 视图内容过滤
    'view_filter'  => [],
    // 日志写入
    'log_write'    => [],
    // 应用结束
    'app_end'      => [],
];
