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
    
    $_lang['minifyinterface']                                           = 'Minify Interface';
    $_lang['minifyinterface.desc']                                      = '';
    
    $_lang['area_minifyinterface']                                      = 'Minify Interface';
    
    $_lang['setting_minifyinterface.enabled']                           = 'Verklein interface bestanden';
    $_lang['setting_minifyinterface.enabled_desc']                      = 'Indien ja, worden alle interface bestanden (zoals CSS en JS bestanden) verkleind en gebundeld zodat deze sneller laden. Standaard is "Nee".';
    $_lang['setting_minifyinterface.cache_path']                        = 'Cache locatie';
    $_lang['setting_minifyinterface.cache_path_desc']                   = 'De locatie waar alle interface bestanden verkleind opgeslagen worden.';
    
    $_lang['minifyinterface_snippet_base_desc']                         = 'De basis URL van het verkleinde interface bestand.';
    $_lang['minifyinterface_snippet_directory_desc']                    = 'De folder waar de opgegeven interface bestanden in staan.';
    $_lang['minifyinterface_snippet_files_desc']                        = 'Alle interface bestanden die verkleind moeten worden. Bestanden scheiden met een komma.';
    $_lang['minifyinterface_snippet_name_desc']                         = 'De naam van van het bestand waar alle verkleinde interface bestanden in gebundeld worden. Indien leeg, word er automatisch een naam gegenereerd.';
    $_lang['minifyinterface_snippet_type_desc']                         = 'De type interface bestanden, dit kan "CSS" of "JS" zijn. Standaard is "CSS".';
    $_lang['minifyinterface_snippet_inline_desc']                       = 'Indien ja, worden alle interface bestanden inline ingeladen. Standaard is "Nee".';
    $_lang['minifyinterface_snippet_tpl_desc']                          = 'De template om het verkleinde interface bestand te embedden in de website. Deze kan beginnen met @INLINE:, @CHUNK: of chunk naam.';
    $_lang['minifyinterface_snippet_tplcss_desc']                       = 'De template om het verkleinde interface bestand te embedden in de website indien het om CSS bestanden gaan. Deze kan beginnen met @INLINE:, @CHUNK: of chunk naam.';
    $_lang['minifyinterface_snippet_tplcssinline_desc']                 = 'De template om het verkleinde interface bestand inline te embedden in de website indien het om CSS bestanden gaan. Deze kan beginnen met @INLINE:, @CHUNK: of chunk naam.';
    $_lang['minifyinterface_snippet_tpljs_desc']                        = 'De template om het verkleinde interface bestand te embedden in de website indien het om JS bestanden gaan. Deze kan beginnen met @INLINE:, @CHUNK: of chunk naam.';
    $_lang['minifyinterface_snippet_tpljsinline_desc']                  = 'De template om het verkleinde interface bestand inline te embedden in de website indien het om JS bestanden gaan. Deze kan beginnen met @INLINE:, @CHUNK: of chunk naam.';
    
?>