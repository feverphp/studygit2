<?php
namespace app\index\model;

use think\Model;

class Members extends Model
{
	protected $type = [
		'status' => 'integer',
		'score' => 'float',
		'create_time' => 'datetime',
		'info' => 'array',
	];
	
	public function getMemberInfo()
	{
		$member = new Members;
		$member->username='wang1001';
		$member->password=sha1('123456');
		$member->create_time = time();
		$member->update_time = time();
		
		$member->save();
		$mem_info = $member->where('id', 1)->find();
		//dump($member);
		dump($member->password);
		dump($member->create_time);
	}
}