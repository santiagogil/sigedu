<div class="centros form">
<?php echo $this->Form->create('Centro',array('type'=>'get','action'=>'index'));?>
	<fieldset>
 		<legend><?php echo __('Buscar'); ?></legend>
        
	<?php
		echo $this->Form->input('sigla');
				
    ?>
    
	</fieldset>
<?php echo $this->Form->end(__('Buscar'));?>
</div>