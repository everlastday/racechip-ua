<?php

class UN_Admin_Editor_Page{
	
	public function __construct(){
		add_action('admin_print_styles-post.php', array(&$this, 'action_print_styles'));
		add_action('add_meta_boxes_un_feedback', array(&$this, 'action_add_meta_boxes'));
		add_action('post_updated_messages', array(&$this, 'filter_post_updated_messages'));
		add_action('admin_enqueue_scripts', array(&$this, 'action_admin_enqueue_scripts'));
		add_action('wp_ajax_un_feedback_reply', array(&$this, 'action_feedback_reply'));
	}
	
	public function action_add_meta_boxes($post){
		global $post_new_file;
		if (isset($post_new_file)){
			$post_new_file = null;
		}
		remove_meta_box('submitdiv', FEEDBACK, 'side');
		add_meta_box('submitdiv', __('Publish'), array(&$this, 'post_submit_meta_box'), 
			FEEDBACK, 'side', 'default');
		$title = un_get_feedback_type_span($post->ID);

		add_meta_box('un-feedback-body0001',
			$title . ($title ? ": " : '') . esc_html($post->post_title),
			array(&$this, 'description_meta_box'),
			FEEDBACK, 'advanced', 'high');

		if(get_post_meta($post->ID, 'u_reply_message', true) != '') {

			$reply_message_from_db = get_post_meta($post->ID, 'u_reply_message', true);
//			echo "<pre>";
//			print_r($reply_message_from_db);
//			echo "</pre>";
			foreach ( $reply_message_from_db as $k => $v) {

//				add_meta_box('un-feedback-body',
//					esc_html($reply_message_from_db[$k]['subject']),
//					array(&$this, 'answer_reply_meta_box'),
//					FEEDBACK);
				add_meta_box('un-feedback-body' .$k,
					'Ответ №' . ($k + 1),
					array(&$this, 'answer_reply_meta_box'),
					FEEDBACK, 'advanced', 'default',$reply_message_from_db[$k] );

			}


		}

		if (get_post_meta($post->ID, '_email', true) || get_post_meta($post->ID, '_author', true)){
			add_meta_box('un-feedback-replys', __('Reply'), array(&$this, 'reply_meta_box'), FEEDBACK, 'advanced', 'low');
		}
	}
	
	public function action_admin_enqueue_scripts($hook){
		global $post_type;
		if (!($post_type == FEEDBACK && $hook == 'post.php'))
			return;
		wp_enqueue_script('quicktags');
		wp_enqueue_script('un-editor-page', usernoise_url('/js/editor-page.js'));
	}
	
	public function action_feedback_reply(){
		$id = (int)$_REQUEST['id'];
		if (!current_user_can(get_post_type_object(FEEDBACK)->cap->edit_posts))
			_e('Cheatin&#8217; uh?');
		$message = trim(stripslashes($_REQUEST['message']));
		if (!$message){
			_e('Please enter some message.', 'usernoise');
			exit;
		}
		$email = get_post_meta($id, '_email', true);
		$author = get_post_meta($id, '_author', true);
		if (!$email){
			if ($user = get_userdata($author)){
				$email = $user->user_email;
			}
		}
		if (!$email){
			_e('Feedback author email is unknown.', 'usernoise');
			exit;
		}
		wp_mail($email, stripslashes($_REQUEST['subject']), stripslashes($_REQUEST['message']),
			'Content-type: text/html');
		_e('Email sent successfully.', 'usernoise');

		if(get_post_meta($id, 'u_reply_message', true) != '')
			$reply_message_from_db = get_post_meta($id, 'u_reply_message', true);

		else
			$reply_message_from_db = array();


		$reply_message_data = Array(
			'subject' => $_REQUEST['subject'],
			      'message' => stripslashes($_REQUEST['message']),
			      'time' => time()
		);



		array_push($reply_message_from_db, $reply_message_data);


		update_post_meta($id, 'u_reply_message', $reply_message_from_db );
		//header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
		exit;
	}
	
	public function filter_post_updated_messages($messages){
		$messages[FEEDBACK][6] = __('Feedback was marked as reviewed', 'usernoise');
		return $messages;
	}
	
	

	public function action_print_styles(){
		global $post_type;
		if ($post_type == FEEDBACK) {
				wp_enqueue_style('un-admin', usernoise_url('/css/admin.css'));
		}
	}
	
	public function reply_meta_box($post){
		global $un_h;
		require(usernoise_path('/html/reply-meta-box.php'));
	}
	
	public function description_meta_box($post){
		do_action('description_meta_box_top', $post);
		if (un_feedback_has_author($post->ID)){
			echo '<div class="un-admin-section un-admin-section-first"><strong>' . __('Author') . ': ';
			un_feedback_author_link($post->ID);
			echo "</strong></div>";
		}
		do_action('description_meta_box_before_content', $post);
		echo '<div class="un-admin-section un-admin-section-last">';
		echo nl2br(esc_html($post->post_content));
		echo '</div>';
		do_action('description_meta_box_bottom', $post);
	}


	public function answer_reply_meta_box($post, $messages_reply_info){
		do_action('description_meta_box_top', $post);
		if (un_feedback_has_author($post->ID)){
			echo '<div class="un-admin-section un-admin-section-first"><strong>'. 'Дата: ' . date("d.m.Y H:i:s", $messages_reply_info['args']['time']) . '<br>'  . 'Тема: ' . $messages_reply_info['args']['subject'] . '<br>'  . 'Отправлено на ' . ': ';
			un_feedback_author_link($post->ID);
			echo "</strong></div>";
		}
		do_action('description_meta_box_before_content', $post);
		echo '<div class="un-admin-section un-admin-section-last">';
		echo nl2br(esc_html($messages_reply_info['args']['message']));
		echo '</div>';
		do_action('description_meta_box_bottom', $post);
	}







		
	public function post_submit_meta_box($post) {
		global $action;
		$post_type = $post->post_type;
		$post_type_object = get_post_type_object($post_type);
		$can_publish = current_user_can($post_type_object->cap->publish_posts);
		require(usernoise_path('/html/publish-meta-box.php'));
	}
}

$un_admin_editor_page = new UN_Admin_Editor_Page;