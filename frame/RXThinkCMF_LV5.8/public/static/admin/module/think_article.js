/**
 * 文章管理
 * @author 牧羊人
 * @since 2020/7/4
 */
layui.use(['form', 'function'], function () {
    var func = layui.function,
        form = layui.form,
        $ = layui.$;

    if (A == 'index') {
        //【TABLE列数组】
        var cols = [
            {type: 'checkbox', fixed: 'left'}
            , {field: 'id', width: 80, title: 'ID', align: 'center', sort: true, fixed: 'left'}
            , {
                field: 'title', width: 400, title: '文章标题', align: 'center', templet: function (d) {
                    return '<a href="' + d.detail_url + '" title="' + d.title + '" class="layui-table-link" target="_blank">' + d.title + '</a>';
                }
            }
            , {
                field: 'cover_url', width: 60, title: '封面', align: 'center', templet: function (d) {
                    var coverStr = "";
                    if (d.cover_url) {
                        coverStr = '<a href="' + d.cover_url + '" target="_blank"><img src="' + d.cover_url + '" height="26" /></a>';
                    }
                    return coverStr;
                }
            }
            , {field: 'cate_name', width: 200, title: '所属分类', align: 'center'}
            , {field: 'view_num', width: 100, title: '浏览数', align: 'center', sort: true}
            , {field: 'format_create_user', width: 150, title: '创建人', align: 'center', sort: true}
            , {field: 'format_create_time', width: 180, title: '创建时间', align: 'center',}
            , {fixed: 'right', width: 150, title: '功能操作', align: 'center', toolbar: '#toolBar'}
        ];

        //【TABLE渲染】
        func.tableIns(cols, "tableList");

        //【设置弹框】
        func.setWin("文章");
    }
});

