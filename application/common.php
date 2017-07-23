<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

use think\Session;
use think\Request;
use app\index\model\Seo;


function seo()//定义seo三个字段,定义domain,定义siteurl

{
    session::set('name', '派书网');
    $seo = Seo::getByController(CONTROLLER_NAME);
    if (empty($seo)) {
        $seo = Seo::getByController('index');
        $title = $seo->title . '-';//两种写法均可
        $title .= session::get('name');
        $keywords = $seo['keywords'];//两种写法均可
        $description = $seo->description;
    } else {
        $title = $seo->title . '-';
        $title .= session::get('name');
        $keywords = $seo['keywords'];
        $description = $seo->description;
    }
    return ["title" => "$title", "keywords" => "$keywords", "description" => "$description"];
}
