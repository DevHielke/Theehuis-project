<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoryTable extends Table
{
	public function initialize(array $config)
		{
		$this->addBehavior('Timestamp');
		$this->belongsTo('Users', [
		'foreignKey' => 'user_id',
		]);
	}
	public function isOwnedBy($catId, $userId)
	{
		return $this->exists(['id' => $catId, 'user_id' => $userId]);
	}

	public function fetchMyData($model) {
    return $model->find('all');
}
}
?>