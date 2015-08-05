<div class="modalidads form">
<?php echo $this->Form->create('Modalidad');?>
	<fieldset>
 		<legend><?php echo __('Editar Modalidad'); ?></legend>
	        <div id="main">
                    <?php echo $this->element('form_modalidad'); ?>
            </div>
	</fieldset>
<?php echo $this->Form->input('id', array('type' => 'hidden'));
      echo $this->Form->end(__('Grabar'));
?>
</div>
<div class="actions">
	<h3><?php echo __('Opciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Borrar'), array('action' => 'delete', $this->Form->value('Modalidad.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Modalidad.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Modalidades'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('Listar Centros'), array('controller' => 'centros', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Centro'), array('controller' => 'centros', 'action' => 'add')); ?> </li>-->
		<li><?php echo $this->Html->link(__('Listar Cursos'), array('controller' => 'cursos', 'action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Curso'), array('controller' => 'cursos', 'action' => 'add')); ?> </li>-->
	</ul>
</div>