<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class DishesTable extends Table
{
	public function initialize(array $config)
		{
		$this->addBehavior('Timestamp');
		//$this->belongsTo('Users', [
		//'foreignKey' => 'user_id',
		//]);
	}
	public function isOwnedBy($dishId, $userId)
	{
		return $this->exists(['id' => $dishId, 'user_id' => $userId]);
	}

	public function fetchMyData($model) {
    return $model->find('all');
}
}
?>