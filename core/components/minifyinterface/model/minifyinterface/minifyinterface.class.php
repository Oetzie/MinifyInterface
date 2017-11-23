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
    
    use MatthiasMullie\Minify;
    
    require_once dirname(__FILE__).'/libs/minify/Minify.php';
    require_once dirname(__FILE__).'/libs/converter/Converter.php';
	 
    class MinifyInterface {
        /**
         * @access public.
         * @var Object.
         */
        public $modx;
        
        /**
         * @access public.
         * @var Array.
         */
        public $config = array();
        
        /**
         * @acces public.
         * @var Array.
         */
        public $properties = array();
        
        /**
         * @access public.
         * @param Object $modx.
         * @param Array $config.
         */
        public function __construct(modX &$modx, array $config = array()) {
            $this->modx =& $modx;
            
            $corePath       = $this->modx->getOption('minifyinterface.core_path', $config, $this->modx->getOption('core_path').'components/minifyinterface/');
            $assetsUrl      = $this->modx->getOption('minifyinterface.assets_url', $config, $this->modx->getOption('assets_url').'components/minifyinterface/');
            $assetsPath     = $this->modx->getOption('minifyinterface.assets_path', $config, $this->modx->getOption('assets_path').'components/minifyinterface/');
            
            $this->config = array_merge(array(
                'namespace'             => $this->modx->getOption('namespace', $config, 'minifyinterface'),
                'lexicons'              => array('minifyinterface:default'),
                'base_path'             => $corePath,
                'core_path'             => $corePath,
                'model_path'            => $corePath.'model/',
                'processors_path'       => $corePath.'processors/',
                'elements_path'         => $corePath.'elements/',
                'chunks_path'           => $corePath.'elements/chunks/',
                'cronjobs_path'         => $corePath.'elements/cronjobs/',
                'plugins_path'          => $corePath.'elements/plugins/',
                'snippets_path'         => $corePath.'elements/snippets/',
                'templates_path'        => $corePath.'templates/',
                'assets_path'           => $assetsPath,
                'js_url'                => $assetsUrl.'js/',
                'css_url'               => $assetsUrl.'css/',
                'assets_url'            => $assetsUrl,
                'connector_url'         => $assetsUrl.'connector.php',
            ), $config);
            
            $this->modx->addPackage('minifyinterface', $this->config['model_path']);
            
            if (is_array($this->config['lexicons'])) {
                foreach ($this->config['lexicons'] as $lexicon) {
                    $this->modx->lexicon->load($lexicon);
                }
            } else {
                $this->modx->lexicon->load($this->config['lexicons']);
            }
        }
		
        
        /**
         * @access public.
         * @param String $$template.
         * @param Array $properties.
         * @param String $type.
         * @return String.
         */
        public function getTemplate($template, $properties = array(), $type = 'CHUNK') {
            if (0 === strpos($template, '@')) {
                $type       = substr($template, 1, strpos($template, ':') - 1);
                $template   = substr($template, strpos($template, ':') + 1, strlen($template));
            }
            
            switch (strtoupper($type)) {
                case 'INLINE':
                    $chunk = $this->modx->newObject('modChunk', array(
                        'name' => $this->config['namespace'].uniqid()
                    ));
            
                    $chunk->setCacheable(false);
            
                    $output = $chunk->process($properties, ltrim($template));
            
                    break;
                case 'CHUNK':
                    $output = $this->modx->getChunk(ltrim($template), $properties);
            
                    break;
            }
            
            return $output;
        }
		
        /**
         * @access public.
         * @param Array $scriptProperties.
         * @return Boolean.
         */
        public function setScriptProperties($scriptProperties = array()) {
            $this->properties = array_merge(array(
                'base'          => '/',
                'directory'     => '',
                'files'         => '',
                'inline'        => false,
                'name'          => '',
                'tpl'           => '',
                'tplCss'        => '@INLINE:<link rel="stylesheet" href="[[+output]]" />',
                'tplCssInline'  => '@INLINE:<style type="text/css">[[+output]]</style>',
                'tplJs'         => '@INLINE:<script type="text/javascript" src="[[+output]]"></script>',
                'tplJsInline'   => '@INLINE:<script type="text/javascript">[[+output]]</script>',
                'type'			=> 'CSS'
            ), $scriptProperties);
            
            return $this->setDefaultProperties();
        }
		
        /**
         * @access protected.
         * @return Boolean.
         */
        protected function setDefaultProperties() {
            if (empty($this->properties['base'])) {
                $this->properties['base'] = $this->modx->getOption('base_path');
            } else {
                $this->properties['base'] = $this->modx->getOption('base_path').trim($this->properties['base'], '/').'/';
            }
            
            if (empty($this->properties['directory'])) {
                $this->properties['directory'] = rtrim($this->properties['directory'], '/').'/';
            }
            
            if (is_string($this->properties['files'])) {
                $this->properties['files'] = preg_split('/(\|\|)|(,)/', $this->properties['files']);
            }
            
            if (in_array(strtolower($this->properties['type']), array('js', 'javascript'))) {
                $this->properties['type']   = 'js';
                $this->properties['types']  = array('js');
            } else {
                $this->properties['type']   = 'css';
                $this->properties['types']  = array('css', 'scss');
            }
            
            if (empty($this->properties['tpl'])) {
                if ((bool) $this->properties['inline']) {
                    $this->properties['tpl'] = $this->properties['tpl'.ucfirst($this->properties['type']).'Inline'];
                } else {
                    $this->properties['tpl'] = $this->properties['tpl'.ucfirst($this->properties['type'])];
                }
            }
        
            return true;
        }
		
        /**
         * @access public.
         * @param Array $properties.
         * @return String.
         */
        public function run($properties = array()) {
            $this->setScriptProperties($properties);
        
            $output = array();
        
            $minified 	= false;
            $files 		= $this->getFiles();
        
            if ((bool) $this->modx->getOption('minifyinterface.enabled', null, false)) {
                if ($minify = $this->getMinifyFile($files)) {
                    if ($this->getMinifyUpdate($minify, $files)) {
                        $minified = $this->setMinifyFile($minify, $files);
                    } else {
                        $minified = true;
                    }
                }
            }
        
            if ($minified) {
                $output[] = $this->getTemplate($this->properties['tpl'], array(
                    'output' => (bool) $this->properties['inline'] ? file_get_contents($minify['assets']) : $minify['assets']
                ));
            } else {
                foreach ($files as $file) {
                    $output[] = $this->getTemplate($this->properties['tpl'], array(
                        'output' => (bool) $this->properties['inline'] ? file_get_contents($file['assets']) : $file['assets']
                    ));
                }
            }
        
            return implode(PHP_EOL, $output);
        }
		
        /**
         * @access protected.
         * @return Array.
         */
        protected function getFiles() {
            $files = array();
        
            foreach ($this->properties['files'] as  $file) {
                $extension = substr($file, strrpos($file, '.') + 1, strlen($file));
        
                if (in_array($extension, $this->properties['types'])) {
                    $file = $this->properties['directory'].$file;
        
                    if (file_exists($this->properties['base'].$file)) {
                        $files[] = array(
                            'name'      => substr('/'.$file, strrpos('/'.$file, '/') + 1, strlen('/'.$file)),
                            'file'      => $this->properties['base'].$file,
                            'assets'    => str_replace($this->modx->getOption('base_path'), '', $file),
                            'time'      => filemtime($this->properties['base'].$file),
                            'date'      => date('Y-m-d H:i:s', filemtime($this->properties['base'].$file))
                        );
                    }
                }
            }
        
            return $files;
        }
		
        /**
         * @access protected.
         * @param Array $files.
         * @return String.
         */
        protected function getName($files = array()) {
            if (empty($this->properties['name'])) {
                $names = array();
                
                foreach ($files as $file) {
                    $names[] = $file['name'];
                }
                
                return md5(implode('+', $names)).'.min.'.strtolower($this->properties['type']);
            }
            
            if (false !== ($pos = strrpos($this->properties['name'], '.'))) {
                return substr($this->properties['name'], 0, $pos).'.'.$this->properties['type'];
            }
            
            return $this->properties['name'].'.'.$this->properties['type'];
        }
		
        /**
         * @access protected.
         * @return Boolean|String.
         */
        protected function getDirectory() {
            $directory = trim($this->modx->getOption('minifyinterface.cache_path', null, 'assets/cache/'), '/').'/';
            
            if (!is_dir($this->properties['base'].$directory)) {
                if (!mkdir($this->properties['base'].$directory, 0777, true)) {
                    return false;
                }
            }
        
            return $this->properties['base'].$directory;
        }
		
        /**
         * @access protected.
         * @param Array $files.
         * @return Boolean|Array.
         */
        protected function getMinifyFile($files = array()) {
            $name       = $this->getName($files);
            $directory  = $this->getDirectory();
            
            if (!file_exists($directory.$name)) {
                if (!fopen($directory.$name, 'c')) {
                    return false;
                }
            
                return array(
                    'file'      => $directory.$name,
                    'assets'    => str_replace($this->modx->getOption('base_path'), '', $directory.$name),
                    'time'      => 0
                );
            }
            
            return array(
                'file'      => $directory.$name,
                'assets'    => str_replace($this->modx->getOption('base_path'), '', $directory.$name),
                'time'      => filemtime($directory.$name)
            );
        }
		
        /**
         * @access protected.
         * @param Array $minify.
         * @param Array $files.
         * @return Boolean.
         */
        protected function setMinifyFile($minify, $files) {
            if ('js' == $this->properties['type']) {
                $minifier = new Minify\JS();
            } else {
                $minifier = new Minify\CSS();
            }
            
            foreach ($files as $file) {
                $minifier->add($file['file']);
            }
            
            if ($minified = $minifier->minify()) {
                if ($stream = fopen($minify['file'], 'w+')) {
                    if (fwrite($stream, $minified)) {
                        fclose($stream);
                        
                        return true;
                    }
                }
            }
            
            return false;
        }
		
        /**
         * @access protected.
         * @param Array $minify.
         * @param Array $files.
         * @return Boolean.
         */
        protected function getMinifyUpdate($minify, $files = array()) {
            foreach ($files as $file) {
                if ($minify['time'] <= $file['time']) {
                    return true;
                }
            }
            
            return false;
        }
		
        /**
         * @access protected.
         * @param String $file.
         * @return Boolean.
         */
        protected function resetMinifyFile($file) {
            if (file_exists($file)) {
                unlink($file);
            }
            
            return true;
        }
	}
	
?>