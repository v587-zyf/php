const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const nodeExternals = require('webpack-node-externals');    //不加载node_module
const CleanWebpackPlugin = require('clean-webpack-plugin');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const copyWebpackPlugin = require('copy-webpack-plugin');
const webpack = require('webpack');
const path = require("path");

module.exports = {
    target: 'node',
    mode: "production", //打包为开发模式
    //devtool:'source-map',//设置source map选项,配合target用来生成source-map文件,以便开发调式debug等,devtool指开发工具
    // 出口对象中，属性为输出的js文件名，属性值为入口文件
    //entry: ["./src/js/index"], //入口文件,从项目根目录指定
    entry: {
        'admin': './src/js/admin',
        'base': './src/js/base',
        'common': './src/js/common',
        'contextMenu': './src/js/contextMenu',
        'dataGrid': './src/js/dataGrid',
        'formX': './src/js/formX',
        'function': './src/js/function',
        'index': './src/js/index',
        'printer': './src/js/printer',
        'QRCode': './src/js/QRCode',
        'tableX': './src/js/tableX',
        'treeTable': './src/js/treeTable'
    },
    output: { //输出路径和文件名，使用path模块resolve方法将输出路径解析为绝对路径
        path: path.resolve(__dirname, "./dist/js"), //将js文件打包到dist/js的目录
        filename: "[name].js"
    },
    module: {
        rules: [
            //配置 css-loader
            {
                test: /\.css$/,   // 正则表达式，表示.css后缀的文件
                include: [
                    path.resolve(__dirname, 'src'),
                ],
                // loader: ['style-loader', 'css-loader'],
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: 'css-loader',
                }),
                // loader: ['style-loader', 'css-loader', 'sass-loader'],
                // use: ExtractTextPlugin.extract({
                //     fallback: "style-loader",
                //     use: ["css-loader", "sass-loader"]
                // }),
                // 忽略node_modules文件
                exclude: [
                    path.resolve(__dirname, "node_modules"),
                ]
            },
            {
                test: /\.(png|svg|jpg|gif|ttf|woff|woff2|eot)(\?\.*)?$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            // 文件名
                            name: '../images/[name].[ext]',
                            // 小于这个时将会已base64位图片打包处理
                            limit: 5 * 1024,
                            // 图片文件输出的文件夹
                            outputPath: "images",
                        }
                    },
                ]
            },
        ]
    },
    plugins: [

        // // 删除文件 保留新文件
        // new CleanWebpackPlugin(),
        // 拷贝文件
        new copyWebpackPlugin([{
            from: path.resolve(__dirname, "./dist/js/admin.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/admin.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/base.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/base.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/common.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/common.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/contextMenu.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/contextMenu.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/dataGrid.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/dataGrid.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/formX.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/formX.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/function.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/function.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/index.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/index.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/printer.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/printer.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/QRCode.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/QRCode.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/tableX.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/tableX.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }, {
            from: path.resolve(__dirname, "./dist/js/treeTable.js"),
            to: path.resolve(__dirname, "./public/static/admin/assets/module/treeTable.js"),
            toType: 'file', // file 或者 dir         可选，默认是文件
            force: true, // 强制覆盖先前的插件           可选 默认false
            ignore: ['.*']
        }]),
    ],
    externals: [
        nodeExternals(),
        {
            'jquery': 'window.jQuery',
            'layui': 'layui-src',
        }
    ],
    resolve: {
        // 配置简写，配置过后，书写该文件路径的时候可以省略文件后缀。如require("common")
        extensions: ['.js', '.json', '.css', '.scss'],
        alias: {
            //layer: __dirname + "/assets/js/layer.js"
        },
    },
    //watch: true   // 监听修改自动打包
}