<?php /* Template Name: Contact */ ?>

<?php

  //response generation function

  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if($type == "success") $response = "<div class='success'>{$message}</div>";
    else $response = "<div class='error'>{$message}</div>";

  }

  //response messages
  $not_human       = "Human verification incorrect.";
  $missing_content = "לא מילאת את כל הנתונים, אנא מלא /י שנית.";
  $email_invalid   = "Email Address Invalid.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "תודה! ההודעה נשלחה. נחזור אליכם בהקדם.";

  //user posted variables
  $name = $_POST['message_name'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];
  $phone = $_POST['message_phone'];
  $event = $_POST['message_event'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";
  
  $message .=  "\n";
  $message .=  'שם: '.$name."\n";
  $message .=  'אי מייל: '.$email."\n";
  $message .=  'טלפון: '.$phone."\n";
  $message .=  'מה האירוע: '.$event."\n";
   
  if (empty($message)) $message="אין הערות";
  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($message), $headers);
          if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
          else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>

<?php get_header(); ?>

	<div class="row" id="inner_page_bg">			
		
		<div class="inner_box">	
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php the_content(); ?>

			<?php endwhile; else: ?>
				<p><?php _e('Sorry, this page does not exist.'); ?></p>
			<?php endif; ?>
			
			
			
			<?php echo $response; ?>
                <form action="<?php the_permalink(); ?>" method="post">
                  <p class="formInput"><label for="name">שם מלא: <span>*</span> </label><input type="text" name="message_name" value="<?php echo esc_attr($_POST['message_name']); ?>"></p>
				  <p class="formInput"><label for="phone">טלפון: <span>*</span> </label><input type="text" name="message_phone" value="<?php echo esc_attr($_POST['message_phone']); ?>"></p>
                  <p class="formInput"><label for="message_email">דוא"ל: <span>*</span> </label><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></p>
				  <p class="formInput"><label for="message_event">מה האירוע: </label><input type="text" name="message_event" value="<?php echo esc_attr($_POST['message_event']); ?>"></p>
                  <p class="formInput"><label for="message_text">הערות:  </label><textarea type="text" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea></p>
                  <p class="formInput"><label for="message_human">כמה זה: <span>*</span> </label><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</p>
                  <input type="hidden" name="submitted" value="1">
                  <p id="BubbleSubmitButton"><input type="submit" value="יאללה"></p>
                </form>
				
			<div style="clear:both"></div>
		</div>					              					
	</div><!--row -->
			

<?php get_footer(); ?>
