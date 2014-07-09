<?php
class UN_Ads{
	function __construct(){
		if (!un_get_option(UN_ENABLED)){
			add_action('admin_notices', array(&$this, 'action_admin_notices'));
		}
	}
	
	public function action_admin_notices(){
		global $parent_file;
		if ($parent_file == 'options-general.php' && isset($_REQUEST['page']) && $_REQUEST['page'] == 'usernoise')
			return;
		?>
		<div class="error">
			<p>
				<?php echo sprintf(__('Usernoise is disabled now. You can enable and configure it at the <a href="%s">settings page</a>.', 'usernoise'), admin_url('options-general.php?page=usernoise'))?>
			</p>
		</div>
		<?php
	}
}
$un_ads = new UN_Ads;