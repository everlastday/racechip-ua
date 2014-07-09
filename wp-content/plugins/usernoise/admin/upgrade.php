<?php
class UN_Upgrade {
	function __construct(){
		if (!$this->usernoisepro_active() || !$this->usernoisepro_installed()){
			//add_action('admin_notices', array(&$this, 'action_admin_notices'));
		}
		if (!$this->usernoisepro_active() || !$this->usernoisepro_installed()){
				add_filter('un_options', array(&$this, '_pro_options_stub'));
		}
	}
	public function _pro_options_stub($options){
		$options []= array('type' => 'tab', 'title' => 'Stub tab');
		return $options;
	}	
	function action_admin_notices(){
		?>
		<div class="error">
			<p>
				<?php if (!$this->usernoisepro_installed()): ?>
					<?php _e(sprintf('You are using Usernoise without Usernoise Pro installed. Consider installing <a href="%s">Usernoise Pro</a> - it adds really nice features.', 'http://karevn.com/usernoise'), 'usernoise-pro') ?>
				<?php else: ?>
					<?php if (!$this->usernoisepro_active()): ?>
						<?php _e(sprintf('Usernoise Pro is installed, but is not active. You can activate it at <a href="%s">Plugins page</a>.', admin_url('plugins.php')), 'usernoise-pro') ?>
					<?php endif ?>
				<?php endif ?>
			</p>
		</div>
		<?php
	}
	
	function usernoisepro_active(){
		return defined('UNPRO_VERSION');
	}
	
	function usernoisepro_installed(){
		if (!function_exists('get_plugins')){
			require_once(ABSPATH . "/wp-admin/includes/plugin.php");
		}
		foreach(get_plugins() as $path => $info){
			if ($info['Name'] == 'Usernoise Pro'){
				return true;
			}
		}
		return false;
	}
}

$un_upgrade = new UN_Upgrade;
?>