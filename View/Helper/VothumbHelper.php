<?php
class VothumbHelper extends AppHelper {

    public $helpers	 = array('Html','Form');

    public function vote($ref, $foreign_key){
    	$Vothumb = ClassRegistry::init('Vothumb.Vothumb', true);
    	$votes=$Vothumb->getVotes($ref,$foreign_key) ;
    	//debug($votes) ;
    	return $this->_View->element('vothumb',array('ref' => $ref, 'foreign_key' => $foreign_key,'votes'=>$votes), array('plugin' => 'Vothumb'));
    }

}