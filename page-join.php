<?php /* Template Name: Join */ ?>

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
  $missing_content = "אנא מלא/י את כל השדות המסומנים בכוכבית.";
  $email_invalid   = "כתובת הדואר האלקטרוני שהזנת אינה תקפה.";
  $message_unsent  = "ההודעה לא נשלחה, אנא נסה / נסי שנית";
  $message_sent    = "תודה! הודעתך נשלחה.";

  //user posted variables
  $name = $_POST['message_name'];
  $adress = $_POST['message_adress'];
  $email = $_POST['message_email'];
  $phone = $_POST['message_phone'];
  $message_age = $_POST['message_age'];
  $human = $_POST['message_human'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Someone sent a message from ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n";
  
  $name .= "\n";
  $name .=  'כתובת: '.$adress."\n";
  $name .=  'נייד: '.$phone."\n";
  $name .=  'גיל: '.$message_age."\n";
  
  if (empty($message_age)) $message_age ="לא צוין גיל";
  if(!$human == 0){
    if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
    else {

      //validate email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        my_contact_form_generate_response("error", $email_invalid);
      else //email is valid
      {
        //validate presence of name and message
        if(empty($name) || empty($message_age)){
          my_contact_form_generate_response("error", $missing_content);
        }
        else //ready to go!
        {
          $sent = wp_mail($to, $subject, strip_tags($name), $headers);
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
				  <p class="formInput"><label for="message_adress">כתובת: <span>*</span>  </label><input type="text" name="message_adress" value="<?php echo esc_attr($_POST['message_adress']); ?>"></p>				  
                  <p class="formInput"><label for="message_email">דוא"ל: <span>*</span> </label><input type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>"></p>
				  <p class="formInput"><label for="phone">נייד: <span>*</span> </label><input type="text" name="message_phone" value="<?php echo esc_attr($_POST['message_phone']); ?>"></p>
                  <p class="formInput"><label for="message_age">גיל: </label><input type="text" name="message_age" value="<?php echo esc_attr($_POST['message_age']); ?>"></p>
                  <p class="formInput"><label for="message_human">כמה זה : <span>*</span> </label><input type="text" style="width: 60px;" name="message_human"> + 3 = 5</p>
                  <br />
				  <p class="formInput">* על מנת לוודא שאתה לא רובוט , אנא הקש את תוצאת המשוואה. 
				  אנחנו יודעים שזו משוואה ממש קלה - אבל תתפלא, רובוטים לא יודעים לפתור אותה</p>
				  <input type="hidden" name="submitted" value="1">
				  <div style="clear:both"></div>
                  <p id="BubbleSubmitButton"><input type="submit" value="יאללה"></p>
                </form>
				
				<div style="clear:both"></div>
		</div>		

		
	</div><!--row -->
			

<?php get_footer(); ?>
