<?php
// +----------------------------------------------------------------------
// | RXThinkCMF框架 [ RXThinkCMF ]
// +----------------------------------------------------------------------
// | 版权所有 2017~2019 南京RXThink工作室
// +----------------------------------------------------------------------
// | 官方网站: http://www.rxthink.cn
// +----------------------------------------------------------------------
// | Author: 牧羊人 <rxthink.cn@gmail.com>
// +----------------------------------------------------------------------

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\TestModel;
use App\Services\TestService;
use App\Http\Requests\TestRequest;

/**
 * 测试-控制器
 * @author zongjl
 * @date 2019/5/24
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    /**
     * 构造方法
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/24
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->model = new TestModel();
        $this->service = new TestService();
        $this->validate = new TestRequest();
    }

    /**
     * 上传图片测试
     * @param Request $request 网络请求
     * @author zongjl
     * @date 2019/5/30
     */
    public function uploadImage(Request $request)
    {
        /**
         * 上传图片(单图)
         */
        $result = upload_image($request);

        // 图片另存为（将图片从临时目录转移至正式目录）
        save_image('网络图片临时地址', 'storage');

        print_r($result);
    }

    /**
     * 检测框架增删改查基本方法
     * @return 返回结果
     * @author zongjl
     * @date 2019/5/24
     */
    public function index()
    {
        print_r("11");exit;
        $this->needLogin();
        /**
         * CURL请求函数封装(POST/GET)
         */
        print_r(curl_get("http://manage.lumen.rxthink.cn/login/login", ['id' => 1, 'realname' => '相约在冬季']));
        print_r(curl_post("http://manage.lumen.rxthink.cn/login/login", ['id' => 1, 'realname' => '相约在冬季']));
        exit;


        /**
         * 配置值解析成数组
         */
        $str = "1:男
2:女
3:未知";
        print_r(parse_attr($str));
        exit;

        $str2 = [
            1 => '男',
            2 => '女',
            3 => '未知2',
        ];
        print_r(parse_attr($str2));
        exit;

        /**
         * DES加解密测试
         */
        $str = encrypt("云恒信息科技");
        print_r(decrypt($str));
        exit;


        // 导出Excel测试
        export_excel("测试导出excel.xls", ['编号', '名称'], [['1', '测试1'], ['2', '测试2'], ['3', '测试3']]);
        exit;

        // 获取、设置、重置整表缓存测试
        $map = [
            ['status', '=', 1],
        ];
        // 缓存主键ID
        print_r($this->model->cacheResetAll($map, true, true));
        // 缓存全表指定字段(字段以逗号分隔字符串形式)
        print_r($this->model->cacheResetAll($map, "id,realname,username", true));
        // 缓存全表指定字段(字段以数组形式传入)
        print_r($this->model->cacheResetAll($map, ['id', 'realname', 'username'], true));
        print_r($this->model->getAll($map, true, true));
        exit;

        // 事务回滚机制与缓存处理测试
        // 开启事务
        $this->model->startTrans();

        $this->model->edit([
            'id' => 1,
            'realname' => '管理员123',
        ]);

        $this->model->edit([
            'id' => 2,
            'realname' => '测试账号12',
        ]);

        // 事务回滚
        $this->model->rollBack();

//        // 事务提交
//        $this->model->commit();

        exit;

        /**
         * 查询方式改进
         */
        $map = [
            'query' => [
                ['realname', '管理员33'], // 查询方式：realname = '管理员33'
                ['status' => 1], // 查询方式：status = 1
                ['status' => [1, 2]], // 查询方式：status in (1,2)
                ['realname', 'not null', ''], // 查询方式：realname is not null
            ],
        ];
        $result = $this->model->getData($map);
        print_r($result);
        exit;

        /**
         * 打印SQL输出
         */
        // 开启执行日志
        $this->model->beginSQLLog();
        $this->model->find(1);
        $this->model->find(2);
        // 结束日志
        $this->model->endSQLLog();

        /**
         * 批量删除
         */
        $result = $this->model->deleteAll([10, 11]);
        print_r($result);
        exit;

        /**
         * 批量更新数据
         */
        $data = [
            ['id' => 21, 'realname' => '测试11111111'],
            ['id' => 22, 'realname' => '测试2222222',]
        ];
        $result = $this->model->saveAll($data);
        print_r($result);
        exit;

        /**
         * 批量插入数据
         */
        $data = [
            ['realname' => '测试2',],
            ['realname' => '测试3',]
        ];
        $result = $this->model->insertAll($data, false);
        print_r($result);
        exit;


        // 开启事务
        $this->model->startTrans();
        $this->model->edit([
            'id' => 5,
            'realname' => '相约在冬季33',
        ]);
        // 事务回滚
//         $this->model->rollBack();
        // 事务提交
        $this->model->commit();
        print_r("22");
        exit;

        // 模型使用事物方法封装
        $this->model->startTrans();
        $this->model->rollBack();
        $this->model->commit();

        /**
         * 打开查询日志
         */
        $this->model->getLastSql(1);

        /**
         * 根据条件查询缓存记录
         */
        $result = $this->model->getInfoByAttr([
            ['realname', 'like', "%相约%"],
        ], ['id', 'realname'], [['id', 'asc']]);
        print_r($result);
        exit;

        /**
         * IN查询测试
         */
        $result = $this->model->getOne([
            ['realname', 'like', "%相约%"],
            ['status', 'in', [1, 2]]
        ], ['id', 'realname']);
        print_r($result);
        exit;

        /**
         * 查询分页数据
         */
        $map = [
            'query' => [
                // like查询
                ['realname', 'like', '%相约%'],
                ['status', 'in', [1, 2]],
            ],
            'sort' => [
                ['id', 'desc']
            ],
            'page' => 1,
            'perpage' => 20,
        ];
        $result = $this->model->pageData($map, function ($info) {
            return [
                'id' => $info['id'],
                'realname' => $info['realname'],
            ];
        });
        print_r($result);
        exit;

        /**
         * 多条件组合查询案例
         */
        $map = [
            'query' => [
                // like查询
                ['realname', 'like', '%相约%'],
                ['realname|username', 'like', '%相约%'],
                // in查询
                ['status', 'in', [1, 2]],
                // not in 查询
                ['status', 'not in', [1]],
                // 比对查询
                ['status', '>=', 1],
                // between查询
                ['status', 'between', [1, 2]],
                // not between查询
                ['status', 'not between', [1, 2]],
                // OR查询,如：or (status=1 and status=2)
                [[['status', '=', 1], ['status', '=', 2]], 'or'],
                // XOR查询,如：and (status=1 or status=2)
                [[['status', '=', 1], ['status', '=', 2]], 'xor'],
            ],
            'sort' => [
                ['id', 'desc']
            ],
        ];
        $result = $this->model->getData($map);
        print_r($result);
        exit;

        /**
         * 数据编辑及SQL日志打印
         */
        $error = '';
        $result = $this->model->edit([
            'id' => 1,
            'realname' => '管理员33',
        ], $error, 1);
        print_r($result);
        exit;


        /**
         * 更新数据（不涉及缓存）
         */
        $result = $this->model->doUpdate([
            'realname' => '管理员22',
        ], ['id' => 1]);
        print_r($result);
        exit;

        /**
         * 更新数据（不涉及缓存）
         */
        $result = $this->model->doInsert([
            'realname' => '测试',
        ]);
        print_r($result);
        exit;

        /**
         * 删除数据(物理删除)
         */
        $result = $this->model->doDelete(['id' => 6]);
        print_r($result);
        exit;

        /**
         * 获取数据表
         */
        $result = $this->model->getTablesList();
        print_r($result);
        exit;

        /**
         * 检查表是否存在
         */
        $result = $this->model->tableExists('admin');
        print_r($result);
        exit;

        /**
         * 获取表字段
         */
        $result = $this->model->getFieldsList('admin');
        print_r($result);
        exit;

        /**
         * 检查表字段
         */
        $result = $this->model->fieldExists('admin', 'realname');
        print_r($result);
        exit;

        /**
         * 删除数据表
         */
        $result = $this->model->dropTable('admin2');
        print_r($result);
        exit;

        /**
         * 数据验证
         */
        $data = [
            'realname' => '相约在冬季222',
            'identity' => '222',
        ];
        if (!$this->validate->check($data)) {
            // 获取验证错误提示信息
            $error = $this->validate->getError();
            print_r($error);
            exit;
        }
        print_r("22");
        exit;

        /**
         * 自定义规则验证
         */
        $data = [
            'realname' => '相约在冬季相约在冬季相约在冬季相约在冬季相约在冬季相约在冬季相约在冬季相约在冬季相约在冬季',
        ];
        if (!$this->validate->check($data, [
            'realname' => 'required|max:10|unique:yh_admin',
        ])) {
            // 获取验证错误提示信息
            $error = $this->validate->getError();
            print_r($error);
            exit;
        }

        /**
         * Redis缓存测试
         */
        Cache::add('name', '123');
        $value = Cache::get('name');
        print_r($value);
        exit;

        /**
         * 更新单行数据
         */
        $result = $this->model->edit([
            'id' => 1,
            'realname' => '管理员11',
        ]);
        print_r($result);
        exit;

        /**
         * 获取缓存信息
         */
        $info = $this->model->getInfo(1);
        print_r($info);
        exit;

        /**
         * 添加数据
         */
        $data = [
            'realname' => '相约在冬季',
            'num' => '0001',
            'mobile' => '15295504159',
        ];
        $result = $this->model->edit($data);
        print_r($result);
        exit;

        /**
         * 编辑信息
         */
        $data = [
            'id' => 3,
            'realname' => '相约在冬季2',
            'num' => '0002',
            'mobile' => '15295504156',
        ];
        $result = $this->model->edit($data);
        print_r($result);
        exit;

        /**
         * 删除数据
         */
        $result = $this->model->drop(5);
        print_r($result);
        exit;

        /**
         * 查询记录总数
         */
        $result = $this->model->getCount([
            ['realname', 'like', "%相约%"]
        ]);
        print_r($result);
        exit;

        /**
         * 查询Value值
         */
        $result = $this->model->getValue([], 'realname');
        print_r($result);
        exit;

        /**
         * 按条件获取一条数据,如需输出指定字段，可以填入第二个参数（数组格式）
         */
        $result = $this->model->getOne([
            ['realname', 'like', "%相约%"],
        ], ['id', 'realname', 'num']);
        print_r($result);
        exit;

        /**
         * 根据主键ID获取数据
         */
        $result = $this->model->getRow(1);
        print_r($result);
        exit;

        /**
         * 字段求和
         */
        $result = $this->model->getSum([
            ['realname', 'like', "%相约%"],
        ], 'id');
        print_r($result);
        exit;

        /**
         * 获取最大值
         */
        $result = $this->model->getMax([], 'id');
        print_r($result);
        exit;

        /**
         * 获取最小值
         */
        $result = $this->model->getMin([], 'id');
        print_r($result);
        exit;

        /**
         * 获取平均值
         */
        $result = $this->model->getAvg([], 'id');
        print_r($result);
        exit;

        /**
         * 更新数据
         */
        $result2 = $this->model->edit([
            'id' => 1,
            'realname' => '管理员123',
        ]);
        print_r($result2);
        exit;

        /**
         * 获取缓存数据
         */
        $result = $this->model->getInfo(1);
        print_r($result);
        exit;

        /**
         * 删除数据并同时删除缓存
         */
        $result = $this->model->drop(1);
        print_r($result);
        exit;

        /**
         * 获取数据列表
         */
        $result = $this->model->getList([
            ['realname', 'like', "%相约%"]
        ], [['id', 'desc']], '0,2');
        print_r($result);
        exit;
    }

    /**
     * 获取数据列表
     * @author zongjl
     * @date 2019/5/23
     */
    public function test()
    {
        $result = $this->service->getAdminList($this->request, $this->admin_id);
        return $this->jsonReturn($result);
    }

    /**
     * 测试分页数据
     * @author zongjl
     * @date 2019/5/23
     */
    public function test2()
    {
        $result = $this->service->getAdminList2($this->request, $this->admin_id);
        return $this->jsonReturn(MESSAGE_OK, true, $result);
    }

    /**
     * 测试中间件
     * @param Request $request
     * @author zongjl
     * @date 2019/5/29
     */
    public function testMiddleware(Request $request)
    {
        print_r($request->all());
        exit;
    }
}
