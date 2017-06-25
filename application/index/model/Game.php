<?php
namespace app\index\model;

use think\Model;

class Game extends Model
{
    public function addData()
    {
        $data['name'] = '神掌三国杀'.rand(1,9);
        $data['icon'] = 'data:image/jpeg;base64,';
        $data['create_time'] = time();
        $data['appkey'] = sha1($data['name'].$data['create_time']);
        $data['update_time'] = time();
        $game_model = new Game;
        $game_info = $game_model->isUpdate(false)->save($data);
        dump($game_model->id);
        dump($game_model);
        return $game_info;
    }
}