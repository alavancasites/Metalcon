<?
$cid = 0;
Yii::app()->clientScript->registerScript('helpers', '                                                           
	var baseUrl = "'.(Yii::app()->baseUrl).'";                                                                                                          
',0);
Yii::app()->clientScript->registerCoreScript('jquery',0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.plainoverlay.min.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/lib/sticky/sticky.min.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/bootstrap/js/bootstrap.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/jquery.maskMoney.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/jquery.mask.min.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/bootstrap-typeahead.js?v='.$cid,0);
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/js/init.js?v='.$cid,2);




