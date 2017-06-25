<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/19 0019
 * Time: 22:30
 */
namespace app\index\controller;
use think\Controller;
use think\Request;

class Game extends Controller {
    public function index(Request $request) {
        echo $request->controller();
        dump($request->param('id'));
    }
}
