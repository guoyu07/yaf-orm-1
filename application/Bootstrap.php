<?php
    use Illuminate\Database\Capsule\Manager as Capsule;
    // 引导程序，所有以_init开头的方法都将被自动调用
    class Bootstrap extends Yaf_Bootstrap_Abstract {
        // 加载vendor下的文件
        public function _initLoader() {
            Yaf_Loader::import(APP_PATH . "/vendor/autoload.php");
        }

        // 配置
        public function _initConfig() {
            $config = Yaf_Application::app()->getConfig();
            Yaf_Registry::set('config', $config);
        }

        // 实例化model用
        /*public function _initNameSpace(){
            Yaf_Loader::getInstance(APP_PATH . '/application/')->registerLocalNamespace('models');
        }*/

        /**
         * 初始化数据库分发器
         * @function _initDatabaseEloquent
         */
        public function _initDatabaseEloquent() {
            // 初始化 illuminate/database
            $capsule = new Capsule;
            // 创建链接
            $capsule->addConnection(Yaf_Application::app()->getConfig()->database->toArray());
            // 设置全局静态可访问
            $capsule->setAsGlobal();
            // 开启Eloquent ORM
            $capsule->bootEloquent();
            // $capsule::connection('dt')->enableQueryLog();
        }
    }