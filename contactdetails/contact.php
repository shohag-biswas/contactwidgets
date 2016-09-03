<?php 

/*
Plugin Name: Contacto
Plugin URI: http://shohag.me/genpro
Description: Contact details for WordPress
Author: Shohag Biswas
Version: 1.0
Author URI: http://shohag.me
*/

class contacto extends WP_Widget{
	
	function contacto(){
		parent::WP_Widget (false, $name = "Contact Widgets");
	}
	
	
		
	function widget($args, $instance) {
		
			extract( $args );

			// these are the widget options
			$title = apply_filters('widget_title', $instance['title']);
			$name = $instance['name'];
			$email = $instance['email'];
			$address = $instance['address'];
			
			
			echo $before_widget;

			// Display the widget
			
			// Check if title is set
			if ( $title ) {
				echo $before_title . $title . $after_title ;
			}
			

			// Check if options are set
			
			if( $name ) {
				echo '<p class="wp_widget_plugin_textarea" style="font-size:25px;">'.$name.'</p>';
			}
			
			if( $email ) {
				echo '<p class="wp_widget_plugin_textarea" style="font-size:15px;">'.$email.'</p>';
			}
			
			if( $address ) {
				echo '<p class="wp_widget_plugin_textarea" style="font-size:12px;">'.$address.'</p>';
				
			}
			
			?> 
			<iframe
			  width="600"
			  height="450"
			  frameborder="0" style="border:0"
			  src="https://www.google.com/maps/embed/v1/place?key=add here your google API&q=<?php $address ?>"
			  allowfullscreen>
			</iframe> <?php
			
			
			echo $after_widget; 
	}
	
	
	function update($new_instance,$old_instance){
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['address'] = strip_tags($new_instance['address']);
		
		return $instance;
	}
	
	function form($instance){
		
		$title = esc_attr($instance['title']);
		$name = esc_attr($instance['name']);
		$email = esc_attr($instance['email']);
		$address = esc_attr($instance['address']);
		
		?>
		
		<p>

        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?></label>

        <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	    </p>



	    <p>

        <label for="<?php echo $this->get_field_id('name'); ?>"><?php _e('Your Name:'); ?></label>

        <input id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />

	    </p> 
		
		<p>

        <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Your Email:'); ?></label>

        <input id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />

	    </p>
		
		<p>

        <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Your Address:'); ?></label>

        <textarea id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text"> <?php echo $address; ?> </textarea>

	    </p>
		
		
		
		<?php
		
	}
	
	
	
}

add_action('widgets_init', create_function('', 'return register_widget("contacto");'));
