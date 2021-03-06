<?php
/*
Copyright (c) 2012 Luis E. S. Dias - www.smartbyte.com.br

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/
?>
<script type="text/javascript">
    myLabelNext = "<?php echo __d('report_manager','Next') ?>";
    myLabelPrevious = "<?php echo __d('report_manager','Previous') ?>";
    myLabelFinish = "<?php echo __d('report_manager','Finish') ?>";
</script>    
<?php echo $this->Html->css('/report_manager/css/report_manager'); ?>
<?php echo $this->Html->css('/report_manager/css/smart_wizard'); ?>
<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js')); ?>
<?php echo $this->Html->script(array('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js')); ?>
<?php echo $this->Html->script(array('/report_manager/js/jquery.smartWizard-2.0.js','/report_manager/js/default.js')); ?>
<?php echo $this->Form->create(null,array('action'=>'wizard' . "/" . implode("/",$this->params['pass']),'target'=>'_blank','id'=>'ReportWizardForm'));?>
<div id="wizard" class="swMain">
  <ul>
    <li><a href="#step-1">
          <label class="stepNumber">1</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 1'); ?><br />
             <small><?php echo __d('report_manager','Select fields'); ?></small>
          </span>
      </a></li>
    <li><a href="#step-2">
          <label class="stepNumber">2</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 2'); ?><br />
             <small><?php echo __d('report_manager','Set the filter'); ?></small>
          </span>
      </a></li>
    <li><a href="#step-3">
          <label class="stepNumber">3</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 3'); ?><br />
             <small><?php echo __d('report_manager','Select order'); ?></small>
          </span>                   
       </a></li>
    <li><a href="#step-4">
          <label class="stepNumber">4</label>
          <span class="stepDesc">
             <?php echo __d('report_manager','Step 4'); ?><br />
             <small><?php echo __d('report_manager','Select style'); ?></small>
          </span>                   
       </a></li>       
  </ul>

  <div id="step-1">   
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 1 Fields'); ?></h2>
        <div class="reportManager index">
        <?php  
        echo $this->Element('fields_dnd_table_header',array(
            'plugin'=>'report_manager',
            'title'=>__d('report_manager','Report Manager'),
            'sortableClass'=>'sortable1'));
        
        if ( isset($this->data[$modelClass]) ) // load from file
            $currentModelSchema = $this->data[$modelClass];
        else // new report
            $currentModelSchema = $modelSchema;
        
        echo $this->Element('fields_dnd',array(
            'plugin'=>'report_manager',
            'modelClass'=>$modelClass,
            'modelSchema'=>$currentModelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] == 'hasMany' || $associatedModels[$key] == 'hasAndBelongsToMany' )
                continue;
            
            if ( isset($this->data[$key]) ) // load from file
                $currentModelSchema = $this->data[$key];
            else // new report
                $currentModelSchema = $value;
            
            echo $this->Element('fields_dnd',array(
                'plugin'=>'report_manager',
                'modelClass'=>$key,
                'modelSchema'=>$currentModelSchema));
        }
        echo $this->Element('fields_dnd_table_close',array('plugin'=>'report_manager'));
        if ( $oneToManyOption != null ) {
            echo $this->Element('fields_dnd_table_header',array(
                'plugin'=>'report_manager',
                'title'=>$oneToManyOption,
                'sortableClass'=>'sortable2'));
            
            if ( isset($this->data[$oneToManyOption]) ) // load from file
                $currentModelSchema = $this->data[$oneToManyOption];
            else // new report
                $currentModelSchema = $associatedModelsSchema[$oneToManyOption];
            
            echo $this->Element('fields_dnd',array(
                'plugin'=>'report_manager',
                'modelClass'=>$oneToManyOption,
                'modelSchema'=>$currentModelSchema)
                );
            echo $this->Element('fields_dnd_table_close',array('plugin'=>'report_manager'));
        }
        ?>

        </div>
  </div>
  <div id="step-2">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 2 Filter'); ?></h2> 
        <?php      
        echo $this->Element('logical_operator');
        echo $this->Element('filter',array('plugin'=>'report_manager','modelClass'=>$modelClass,'modelSchema'=>$modelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] != 'hasMany' && $associatedModels[$key] != 'hasAndBelongsToMany' )            
                echo $this->Element('filter',array('plugin'=>'report_manager','modelClass'=>$key,'modelSchema'=>$value));
        }
        ?> 
  </div>                      
  <div id="step-3">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 3 Order'); ?></h2>   
        <?php
        echo $this->Element('order_direction');
        echo $this->Element('order',array('plugin'=>'report_manager','modelClass'=>$modelClass,'modelSchema'=>$modelSchema));
        foreach ($associatedModelsSchema as $key => $value) {
            if ( $associatedModels[$key] != 'hasMany' && $associatedModels[$key] != 'hasAndBelongsToMany' )            
                echo $this->Element('order',array('plugin'=>'report_manager','modelClass'=>$key,'modelSchema'=>$value));
        }
        ?> 
  </div>
  <div id="step-4">
      <h2 class="StepTitle"><?php echo __d('report_manager','Step 4 Style'); ?></h2>   
        <?php
        echo $this->Element('report_style',array('plugin'=>'report_manager','oneToManyOption'=>$oneToManyOption));
        ?> 
  </div>    
</div>
<?php echo $this->Element('one_to_many_option',array('plugin'=>'report_manager','oneToManyOption'=>$oneToManyOption)); ?> 
<?php echo $this->Form->end() ;?>