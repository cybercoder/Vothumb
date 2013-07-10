<?php
class VothumbsController extends AppController {

	public $name = 'Vothumbs';
	public $helpers = array('Js' => array('Jquery'));
	public $components = array('Cookie') ;

	function beforeFilter() {
		parent::beforeFilter();
		//this->Auth->allow('index', 'add','view');
		//$this->Auth->allow('view','add');
	}

	public function thumbUP($ref,$foreign_key) {
		if (empty($ref) || empty($foreign_key)) exit ;

		$cookie=$this->Cookie->read('Vothumb.'.$ref.$foreign_key) ;
		if (!($cookie=='Voted')) {
			$this->layout = 'ajax' ;
			$this->autoRender=false ;
			$vothumb = $this->Vothumb->find('first',array('conditions'=>array('Vothumb.model'=>$ref,'Vothumb.foreign_key'=>$foreign_key))) ;
			if (!empty($vothumb)) {
				$this->Vothumb->id=$vothumb['Vothumb']['id'] ;
				$this->Vothumb->saveField('like',$this->Vothumb->field('like')+1) ;
			}else{
				$this->Vothumb->create() ;
				$data['model'] = $ref ;		$data['foreign_key'] = $foreign_key ;	$data['like'] = 1 ;
				$this->Vothumb->save($data) ;
			}

			$newValue=$this->Vothumb->find('first',array('fields'=>array('id','like','dislike'),'conditions'=>array('Vothumb.model'=>$ref,'Vothumb.foreign_key'=>$foreign_key))) ;

			$this->Cookie->write('Vothumb.'.$ref.$foreign_key, 'Voted' , false, 31104000);

			$this->set('votes',$newValue) ;
			$this->set('ref',$ref) ;
			$this->set('foreign_key',$foreign_key) ;
			$this->render('/Elements/vothumb');
		}
	}

	public function thumbDown($ref,$foreign_key) {
		if (empty($ref) || empty($foreign_key)) exit ;

		$cookie=$this->Cookie->read('Vothumb.'.$ref.$foreign_key) ;
		if (!($cookie=='Voted')) {
			$this->layout = 'ajax' ;
			$this->autoRender=false ;
			$vothumb = $this->Vothumb->find('first',array('conditions'=>array('Vothumb.model'=>$ref,'Vothumb.foreign_key'=>$foreign_key))) ;
			if (!empty($vothumb)) {
				$this->Vothumb->id=$vothumb['Vothumb']['id'] ;
				$this->Vothumb->saveField('dislike',$this->Vothumb->field('dislike')+1) ;
			}else{
				$this->Vothumb->create() ;
				$data['model'] = $ref ;		$data['foreign_key'] = $foreign_key ;	$data['dislike'] = 1 ;
				$this->Vothumb->save($data) ;
			}

			$newValue=$this->Vothumb->find('first',array('fields'=>array('id','like','dislike'),'conditions'=>array('Vothumb.model'=>$ref,'Vothumb.foreign_key'=>$foreign_key))) ;

			$this->Cookie->write('Vothumb.'.$ref.$foreign_key, 'Voted' , false, 31104000);

			$this->set('votes',$newValue) ;
			$this->set('ref',$ref) ;
			$this->set('foreign_key',$foreign_key) ;
			$this->render('/Elements/vothumb');
		}
	}
}
?>
