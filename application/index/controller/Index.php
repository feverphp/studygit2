<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Members;
use think\Db;
use app\index\model\Game;
use think\Error;

class Index extends Controller
{
    public $memberModel;

    public function _initialize()
    {
        parent::_initialize();
        $this->memberModel = new Members();
    }

    public function index(Members $member)
    {
        dump($_SERVER);
        //echo THINK_PATH;
        //$error = new Error();
        //$member->getMemberInfo();
        //$member->getMemData();
    }
    
    public function getServerInfo()
    {
        return array('code'=>1, 'msg'=>'请求访问的方式');
    }
    
    // practise query
    public function selectDataFromDatabase()
    {
        $data1 = Db::name('members')->where('username', 'wang1001')->select();
        //dump($data1);
        $data2 = Db::table('c_members')->where('id','<',5)->select();
        //dump($data2);
        $members = db('members');
        $data3 = $members->where('id','<',9)->select();
        //dump($members);
        //dump($data3);
        //dump(db('members',[],false));
        $data4 = Db::select(function($query){
            $query->table('c_members')->where('id', '<', 5)->order('id', 'desc');
        });
        //dump($data4);
        $data5 = Db::name('game')->where('id','>',8)->column('name','id');
        //dump($data5);
        $data6 = Db::name('game')->where('id', 19)->value('appkey');
        dump($data6);
        $data7 = Db::name('game')->where('id', '>', 8)->column('name, create_time', 'id');
        dump($data7);
    }
    
    public function addGameData(Game $game_model)
    {
        $game_info = $game_model->addData();
//        $id = $game_info->pk();
  //      dump($id);
        dump($game_model);
        dump($game_info);
    }
    
    // 测试chunk方法
    public function chunkData()
    {
        Db::name('game')->chunk(100, function($games){
            dump($games);
            foreach ($games as $game) {
                dump($game);
            }
        });
    }
    
    public function getTableInfo()
    {
        $game_table_info = Db::getTableInfo('c_game');
        dump($game_table_info);
    }
    
    public function getWhere()
    {
        $sql = Db::name('game')->where('id', '=', 1)
        ->whereOr(function($query){
            $query->whereOr('name', '=', 2)->whereOr('appkey', '=', 3);
        })->select(false); 
        
        //dump($sql);
        $map['id'] = 1;
        $where['name'] = 2;
        $where['appkey'] = 3;
        $sql2 = Db::name('game')->where($where)->whereOr($map)->select(false);
        dump($sql2);
    }
    
    public function test()
    {
        $day_time = date('Y-m-d', time());
        $start_time = $day_time.' 21:30:00';
        $end_time = $day_time.' 22:00:00';
        $now_time = time();
        if (($start_time <= $now_time) && ($end_time >= $now_time)) {
            $pay_flag = 1;
        } else {
            $pay_flag = 0;
        }
    }
    
}
