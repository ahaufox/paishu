<?php
/**
 * Created by PhpStorm.
 * User: Ahaufox
 * Date: 2017/7/7
 * Time: 下午11:21
 */

namespace app\index\model;

use think\Model;
use think\Request;
use think\Session;

class OnSale extends Model
{

    function book()
    {
        $id = Request::instance()->param()['id'];
        $info = $this->getByProductId($id);
        if (!$info) {
            return NULL;
        }
        return [
            "title" => $info->title,
            "auth" => $info->auth,
            "isbn" => $info->isbn,
            "userid" => $info->user_id
        ];
    }
}