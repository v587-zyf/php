<?php


namespace App\Models;

use Illuminate\Support\Facades\DB;

/**
 * CMS管理-模型
 * @author 牧羊人
 * @since 2020/8/30
 * Class ArticleModel
 * @package App\Models
 */
class ArticleModel extends BaseModel
{
    // 设置数据表
    protected $table = "article";

    /**
     * 获取记录信息
     * @param int $id 记录ID
     * @return array|string
     * @author 牧羊人
     * @since 2020/8/30
     */
    public function getInfo($id)
    {
        $info = parent::getInfo($id);
        if ($info) {
            // 文章封面
            if ($info['cover']) {
                $info['cover_url'] = get_image_url($info['cover']);
            }

            // 获取栏目
            if ($info['cate_id']) {
                $itemCateModel = new ItemCateModel();
                $itemCateInfo = $itemCateModel->getInfo($info['cate_id']);
                $info['cate_name'] = $itemCateInfo['item_name'] . ">>" . $itemCateInfo['name'];
            }
            // 获取分表
            $tableName = $this->getArticleTable($id);
            $articleModel = DB::table($tableName);
            $articleInfo = $articleModel->find($id);
            if ($articleInfo) {
                $articleInfo = json_decode(json_encode($articleInfo), true);
                if (isset($articleInfo['content']) && $articleInfo['content']) {
                    while (strstr($articleInfo['content'], "[IMG_URL]")) {
                        $articleInfo['content'] = str_replace("[IMG_URL]", IMG_URL, $articleInfo['content']);
                    }
                }
                $info = array_merge($info, $articleInfo);
            }

            // 文章图集
            if ($info['imgs']) {
                $imgsList = unserialize($info['imgs']);
                foreach ($imgsList as &$val) {
                    $val = get_image_url($val);
                }
                $info['imgsList'] = $imgsList;
            }
        }
        return $info;
    }

    /**
     * 添加或编辑
     * @param array $data 数据源
     * @param string $error 错误信息
     * @param bool $isSql 打印SQL
     * @return bool|int|string
     * @throws \think\db\exception\BindParamException
     * @since 2020/7/4
     * @author 牧羊人
     */
    public function edit($data = [], &$error = '', $isSql = false)
    {
        // 获取数据表字段
        $column = $this->getFieldsList($this->table);
        $item = [];
        foreach ($data as $key => $val) {
            if (!in_array($key, array_keys($column))) {
                $item[$key] = $val;
                unset($data[$key]);
            }
        }

        // 开启事务
//        $this->startTrans();
        $rowId = parent::edit($data, $error, $isSql);
        if (!$rowId) {
            //事务回滚
//            $this->rollback();
            return false;
        }
        $result = $this->saveArticleInfo($rowId, $item);
        if (!$result) {
            // 事务回滚
//            $this->rollback();
            return false;
        }
        // 提交事务
//        $this->commit();
        return $rowId;
    }

    /**
     * 保存文章附表信息
     * @param $id 记录ID
     * @param $item 附表数据
     * @return bool
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author 牧羊人
     * @since 2020/7/4
     */
    public function saveArticleInfo($id, $item)
    {
        $tableName = $this->getArticleTable($id);
        $info = DB::table($tableName)->find($id);
        $info = json_decode(json_encode($info), true);

        $data = [];
        if (!$info) {
            $data['id'] = $id;
        }
        $data['content'] = $item['content'];
        if ($item['guide']) {
            $data['guide'] = $item['guide'];
        }
        if ($item['imgs']) {
            $data['imgs'] = $item['imgs'];
        }

        //获取分表模型
        $tableName = $this->getArticleTable($id);
        $articleModel = DB::table($tableName);
        if ($info['id']) {
            $result = $articleModel->where('id', $id)->update($data);
        } else {
            $result = $articleModel->insert($data);
        }
        if ($result !== false) {
            return true;
        }
        return false;
    }

    /**
     * 获取文章附表名
     * @param $id 记录ID
     * @param bool $isPrefix 是否包含表前缀
     * @return string
     * @since 2020/7/4
     * @author 牧羊人
     */
    public function getArticleTable($id, $isPrefix = false)
    {
        $tableName = substr($id, -1, 1);
        $tableName = "article_{$tableName}";
        if ($isPrefix) {
            $tableName = DB_PREFIX . $tableName;
        }
        return $tableName;
    }
}
