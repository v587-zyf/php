<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * 行为日志-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class ActionLogModel
 * @package App\Models
 */
class ActionLogModel extends BaseModel
{
    // 设置数据表
    protected $table = null;
    // 自定义日志标题
    protected static $title = '';
    // 自定义日志内容
    protected static $content = '';

    public function __construct()
    {
        // 设置表名
        $this->table = 'action_log_' . date('Y') . '_' . date('m');
        // 初始化行为日志表
        $this->initTable();
    }

    /**
     * 初始化行为日志表
     * @return string|null
     * @since 2020/8/30
     * @author 牧羊人
     */
    private function initTable()
    {
        $tbl = DB_PREFIX . $this->table;
        if (!$this->tableExists($tbl)) {
            $sql = "CREATE TABLE `{$tbl}` (
                  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '唯一性标识',
                  `action_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '行为ID',
                  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否后台操作：1是 2否',
                  `username` varchar(60) CHARACTER SET utf8mb4 NOT NULL COMMENT '操作人用户名',
                  `method` varchar(20) CHARACTER SET utf8mb4 NOT NULL COMMENT '请求类型',
                  `module` varchar(30) NOT NULL COMMENT '模型',
                  `action` varchar(255) NOT NULL COMMENT '操作方法',
                  `url` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT '操作页面',
                  `param` text CHARACTER SET utf8mb4 NOT NULL COMMENT '请求参数(JSON格式)',
                  `title` varchar(100) NOT NULL COMMENT '日志标题',
                  `content` varchar(1000) NOT NULL DEFAULT '' COMMENT '内容',
                  `ip` varchar(18) CHARACTER SET utf8mb4 NOT NULL COMMENT 'IP地址',
                  `user_agent` varchar(360) CHARACTER SET utf8mb4 NOT NULL COMMENT 'User-Agent',
                  `create_user` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加人',
                  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
                  `update_user` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新人',
                  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
                  `mark` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '有效标识：1正常 0删除',
                  PRIMARY KEY (`id`) USING BTREE
                ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COMMENT='系统行为日志表';";
            DB::select($sql);
        }
        return $tbl;
    }

    /**
     * 设置标题
     * @param string $title 标题
     * @author 牧羊人
     * @date 2019/4/4
     */
    public static function setTitle($title)
    {
        self::$title = $title;
    }

    /**
     * 设置内容
     * @param string $content 内容
     * @author 牧羊人
     * @date 2019/4/4
     */
    public static function setContent($content)
    {
        self::$content = $content;
    }

    /**
     * 记录行为日志
     * @author 牧羊人
     * @date 2019/4/4
     */
    public static function record()
    {
        if (!self::$title) {
            // 操作控制器名
            $menuModel = new MenuModel();
            $info = $menuModel->getOne([
                ['url', '=', request()->url()],
            ]);
            if ($info) {
                if ($info['type'] == 4) {
                    $menuInfo = $menuModel->getInfo($info['pid']);
                    self::$title = $menuInfo['name'];
                } else {
                    self::$title = $info['name'];
                }
            }
        }

        // 登录用户ID
        $adminId = session('adminId');
        $adminModel = new AdminModel();
        $adminInfo = $adminModel->getInfo($adminId);

        // 日志数据
        $data = [
            'username' => isset($adminInfo['realname']) ? $adminInfo['realname'] : '系统用户',
            'module' => 'admin',
            'action' => request()->path(),
            'method' => request()->method(),
            'url' => request()->url(true), // 获取完成URL
            'param' => request()->all() ? json_encode(request()->all()) : '',
            'title' => self::$title ? self::$title : '操作日志',
            'content' => self::$content,
            'ip' => request()->ip(),
            'user_agent' => request()->server('HTTP_USER_AGENT'),
            'create_user' => empty(session('adminId')) ? 0 : session('adminId'),
            'create_time' => time(),
        ];
        // 日志入库
        self::insert($data);
    }
}
