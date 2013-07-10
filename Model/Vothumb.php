<?php
class Vothumb extends AppModel {

	var $name = 'Vothumb';
	var $validate = array(
		'model' => array('notempty'),
		'foreign_key' => array('notempty')
	);

	public function getVotes($ref,$foreign_key,$options = array()) {

		$options['conditions']['model'] = $ref;
		$options['conditions']['foreign_key'] = $foreign_key;

		return $this->find('first',$options);
	}
}
