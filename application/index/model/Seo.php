<?php
/**
 * Created by PhpStorm.
 * User: Ahaufox
 * Date: 2017/7/6
 * Time: 下午11:34
 */
namespace app\index\model;

use think\Model;
use think\Request;
define('CONTROLLER_NAME',Request::instance()->controller());
class Seo extends Model
{

    //设置各个页面的seo标题


}