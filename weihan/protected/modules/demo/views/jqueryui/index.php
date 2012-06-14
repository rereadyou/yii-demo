<?php 
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' =>'zh-CN',
	'name'=>'publishDate',
	'value' => '0000-00-00',
    // additional javascript options for the date picker plugin
    'options'=>array(
//     	'autoSize' => true,
		'showAnim'=>'fold',
    	'yearRange' => '1980:2020',
    	'changeYear' => true,
//     	'changeMonth' => true,
//     	'showButtonPanel' => true,
	),
    'htmlOptions'=>array(
		'style'=>'height:20px;'
	),
));


$this->widget('zii.widgets.jui.CJuiAccordion', array(
     'panels'=>array(
		         'panel 1'=>'content for panel 1',
		         'panel 2'=>'content for panel 2',
		         // panel 3 contains the content rendered by a partial view
// 		         'panel 3'=>$this->renderPartial('_partial',null,true),
		     ),
     // additional javascript options for the accordion plugin
     'options'=>array(
		         'animated'=>'bounceslide',
		     ),
 ));

echo '自动补全（输入a）';
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
     'name'=>'city',
     'source'=>array('ac1', 'ac2', 'ac3'),
     // additional javascript options for the autocomplete plugin
     'options'=>array(
		         'minLength'=>'1',
		     ),
     'htmlOptions'=>array(
		         'style'=>'height:20px;'
	),
 ));

echo "<br>";
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
      'id'=>'mydialog',
      // additional javascript options for the dialog plugin
      'options'=>array(
          'title'=>'Dialog box 1',
          'autoOpen'=>false,
      ),
  ));
 
      echo 'dialog content here';
 
  $this->endWidget('zii.widgets.jui.CJuiDialog');
 
  // the link that may open the dialog
  echo CHtml::link('open dialog', '#', array(
     'onclick'=>'$("#mydialog").dialog("open"); return false;',
  ));
  
  
  echo "<br>";
/*   $this->widget('zii.widgets.jui.CJuiSelectable', array(
  		     'items'=>array(
  				         'id1'=>'Item 1',
  				         'id2'=>'Item 2',
  				         'id3'=>'Item 3',
  				     ),
  		     // additional javascript options for the selectable plugin
  		     'options'=>array(
  				         'delay'=>'300',
  				     ),
  		 )); */
?>