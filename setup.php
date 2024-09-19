<?php
// Name of the plugin
define('PLUGIN_UPDATEEMAIL_VERSION', '1.0.0');

// Required GLPI version
define('PLUGIN_UPDATEEMAIL_MIN_GLPI_VERSION', '10.0');

// Plugin description
function plugin_version_updateemail() {
   return [
      'name'           => 'UpdateEmail',
      'version'        => PLUGIN_UPDATEEMAIL_VERSION,
      'author'         => 'Roman Yahin',
      'license'        => 'GPLv3+',
      'homepage'       => 'https://github.com/romannadym/updateemail',
      'minGlpiVersion' => PLUGIN_UPDATEEMAIL_MIN_GLPI_VERSION,
   ];
}

// Initialization
function plugin_init_updateemail() {
   global $PLUGIN_HOOKS;
   $PLUGIN_HOOKS['csrf_compliant']['updateemail'] = true;
   $PLUGIN_HOOKS['menu_toadd']['updateemail']['config'] =  ['PluginUpdateemailMenu'];
   $PLUGIN_HOOKS['config_page']['updateemail'] = 'front/updateemail.php';
}
