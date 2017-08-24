<?php

	/**
	 * Minify Interface
	 *
	 * Copyright 2017 by Oene Tjeerd de Bruin <modx@oetzie.nl>
	 *
	 * Minify Interface is free software; you can redistribute it and/or modify it under
	 * the terms of the GNU General Public License as published by the Free Software
	 * Foundation; either version 2 of the License, or (at your option) any later
	 * version.
	 *
	 * Minify Interface is distributed in the hope that it will be useful, but WITHOUT ANY
	 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
	 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
	 *
	 * You should have received a copy of the GNU General Public License along with
	 * Minify Interface; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
	 * Suite 330, Boston, MA 02111-1307 USA
	 */

	$_lang['minifyinterface'] 										= 'Minify Interface';
	$_lang['minifyinterface.desc'] 									= '';
	
	$_lang['area_minifyinterface'] 									= 'Minify Interface';
	
	$_lang['setting_minifyinterface,enabled']						= 'Minify interface files';
	$_lang['setting_minifyinterface,enabled_desc']					= 'If yes, all interface files (like CSS en JS files) will be minified and combined together for faster loading. Default is "No".';
	$_lang['setting_minifyinterface.cache_path']					= 'Cache location';
	$_lang['setting_minifyinterface.cache_path_desc']				= 'The location where all minified interface files will be saved.';
	
	$_lang['thumbnail_minifyinterface_directory_desc']				= 'The folder where all the specified interface files are located.';
	$_lang['thumbnail_minifyinterface_files_desc']					= 'All interface files that needs to be minified. Separate files with a comma.';
	$_lang['thumbnail_minifyinterface_name_desc']					= 'The name of the file where all the minified interface files needs to be combined in. If empty, an name will be generated automaticly.';
	$_lang['thumbnail_minifyinterface_type_desc']					= 'The type of the interface files, this can be "CSS" or "JS". Default is "CSS".';
	$_lang['thumbnail_minifyinterface_inline_desc']					= 'If yes, all interface files will be loaded inline. Default is "Nee".';
	$_lang['thumbnail_minifyinterface_tpl_desc']					= 'The template to embed all minified interface files into the site. This can start with @INLINE:, @CHUNK: or chunk name.';
	$_lang['thumbnail_minifyinterface_tplcss_desc']					= 'The template to embed all minified interface files into the site when it are CSS files. This can start with @INLINE:, @CHUNK: or chunk name.';
	$_lang['thumbnail_minifyinterface_tplcssinline_desc']			= 'The template to embed all minified interface files inline into the site when it are CSS files. This can start with @INLINE:, @CHUNK: or chunk name.';
	$_lang['thumbnail_minifyinterface_tpljs_desc']					= 'The template to embed all minified interface files into the site when it are JS files. This can start with @INLINE:, @CHUNK: or chunk name.';
	$_lang['thumbnail_minifyinterface_tpljsinline_desc']			= 'The template to embed all minified interface files inline into the site when it are JS files. This can start with @INLINE:, @CHUNK: or chunk name.';
		
?>