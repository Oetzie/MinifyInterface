<?php

	$settings = array();
	
	$settings[0] = $modx->newObject('modSystemSetting');
	$settings[0]->fromArray(array(
		'key' 		=> PKG_NAME_LOWER.'.enabled',
		'value' 	=> 1,
		'xtype' 	=> 'combo-boolean',
		'namespace' => PKG_NAME_LOWER,
		'area' 		=> PKG_NAME_LOWER
	), '', true, true);
	
	$settings[1] = $modx->newObject('modSystemSetting');
	$settings[1]->fromArray(array(
		'key' 		=> PKG_NAME_LOWER.'.cache_path',
		'value' 	=> 'assets/cache/',
		'xtype' 	=> 'textfield',
		'namespace' => PKG_NAME_LOWER,
		'area' 		=> PKG_NAME_LOWER
	), '', true, true);
		
	return $settings;
	
?>