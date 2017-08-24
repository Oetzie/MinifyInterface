<?php

	return array(
		array(
	        'name' 		=> 'directory',
	        'desc' 		=> 'thumbnail_minifyinterface_directory_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'files',
	        'desc' 		=> 'thumbnail_minifyinterface_files_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'inline',
	        'desc' 		=> 'thumbnail_minifyinterface_inline_desc',
	        'type' 		=> 'combo-bolean',
	        'options' 	=> '',
	        'value'		=> 1,
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'name',
	        'desc' 		=> 'thumbnail_minifyinterface_name_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'tpl',
	        'desc' 		=> 'thumbnail_minifyinterface_tpl_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'tplCss',
	        'desc' 		=> 'thumbnail_minifyinterface_tplcss_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '@INLINE:<link rel="stylesheet" href="[[+output]]" />',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'tplCssInline',
	        'desc' 		=> 'thumbnail_minifyinterface_tplcssinline_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '@INLINE:<style type="text/css">[[+output]]</style>',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'tplJs',
	        'desc' 		=> 'thumbnail_minifyinterface_tpljs_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '@INLINE:<script type="text/javascript" src="[[+output]]"></script>',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'tplJsInline',
	        'desc' 		=> 'thumbnail_minifyinterface_tpljsinline_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> '@INLINE:<script type="text/javascript">[[+output]]</script>',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    ),
	    array(
	        'name' 		=> 'type',
	        'desc' 		=> 'thumbnail_minifyinterface_type_desc',
	        'type' 		=> 'textfield',
	        'options' 	=> '',
	        'value'		=> 'CSS',
	        'area'		=> PKG_NAME_LOWER,
	        'lexicon' 	=> PKG_NAME_LOWER.':default'
	    )
	);

?>