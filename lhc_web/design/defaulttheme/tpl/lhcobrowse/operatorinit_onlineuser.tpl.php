var lhcbrowserOpeator = new LHCCoBrowserOperator(window,document,{'mode':'onlineuser','lhcbase':'<?php echo erLhcoreClassSystem::getHost()?><?php echo erLhcoreClassDesign::baseurl('cobrowse/proxycss')?>','httpsmode':<?php echo erLhcoreClassSystem::$httpsMode == true ? 'true' : 'false'?>,'disableiframe':<?php echo erLhcoreClassModelChatConfig::fetch('disable_iframe_sharing')->current_value == 1 ? 'true' : 'false'?>,'disablejs':<?php echo erLhcoreClassModelChatConfig::fetch('disable_js_execution')->current_value == 1 ? 'true' : 'false'?>,options:{opcontrol:$('#status-icon-control'),opscroll:$('#sync-user-scroll'),opmouse:$('#show-operator-mouse'),scroll:$('#scroll-user-window')},'cpos':{w:<?php echo $browse->w?>,wh:<?php echo $browse->wh?>},'cursor':'<?php echo erLhcoreClassSystem::getHost()?><?php echo erLhcoreClassDesign::design('images/icons/cursor.png')?>','nodejssettings':{'nodejssocket':<?php echo json_encode(erLhcoreClassModelChatConfig::fetch('sharing_nodejs_sllocation')->current_value)?>,'nodejshost':<?php echo json_encode(erLhcoreClassModelChatConfig::fetch('sharing_nodejs_socket_host')->current_value)?>,'path':'<?php echo erLhcoreClassModelChatConfig::fetch('sharing_nodejs_path')->current_value?>','secure':<?php if ((int)erLhcoreClassModelChatConfig::fetch('sharing_nodejs_secure')->current_value == 1) : ?>true<?php else : ?>false<?php endif;?>},'nodejsenabled':<?php echo (int)erLhcoreClassModelChatConfig::fetch('sharing_nodejs_enabled')->current_value?>,'online_user_hash':'<?php echo $browse->online_user->vid?>','online_user_id':<?php echo $browse->online_user_id?>, 'base':<?php echo json_encode($browse->url)?>, 'initialize' : <?php echo $browse->initialize != '' ? $browse->initialize : 'null'?>});