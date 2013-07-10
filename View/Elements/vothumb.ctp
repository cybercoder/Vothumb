
<?php $uniq=md5(uniqid(rand(), true)) ; ?>
	<div id="Vothumb<?php echo $uniq ;?>">
		<?php
			if(empty($votes)) {
				$votes['Vothumb']['like']=0 ; $votes['Vothumb']['dislike']=0 ;
			}

			echo $votes['Vothumb']['like'].'&nbsp;' ;

			echo $this->Js->link(
				$this->Html->image('Vothumb.thumb_up.png'),
				array('plugin'=>'vothumb','controller'=>'vothumbs','action'=>'thumbUP',$ref,$foreign_key),
				array('update' => '#Vothumb'.$uniq,'escape'=>false)
			);


			echo $this->Js->link(
				$this->Html->image('Vothumb.thumb_down.png'),
				array('plugin'=>'vothumb','controller'=>'vothumbs','action'=>'thumbDown',$ref,$foreign_key),
				array('update' => '#Vothumb'.$uniq,'escape'=>false)
			);
			
			echo '&nbsp;'.$votes['Vothumb']['dislike'] ;
		?>
	</div>
<?php echo $this->Js->writeBuffer(); // Write cached scripts ?>