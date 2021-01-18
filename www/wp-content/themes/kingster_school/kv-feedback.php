
<?php
/**
Template Name: Find A Plate
 */
get_header();
global $wpdb;
$tbl_name = $wpdb->prefix.'feedback';
$errors = new WP_Error();
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "submit-a-plate") {
    $fields = array(
        'sws_persion_name',
        'sws_persion_contact_no',
        'sws_persion_email',
        'sws_feedback'
    );
    foreach ($fields as $field) {
        if (isset($_POST[$field])) $posted[$field] = stripslashes(trim($_POST[$field])); else $posted[$field] = '';
    }

    if ($posted['sws_persion_name'] != null )
        $sws_persion_name =  $_POST['sws_persion_name'];
    else
        $errors->add('empty_title', __('<strong>Notice</strong>: Please enter your name first.', 'sws'));
    $sws_persion_name = '';
    $sws_persion_contact_no = '';
    $sws_persion_email = '';
    $sws_feedback = '';
    if ( !$errors->get_error_code() ) {
        $kv_data = array(
            'person_name' => $sws_persion_name,
            'contact_no'	=> $sws_persion_contact_no,
            'email'			=> $sws_persion_email,
            'feedback' 	=> $sws_feedback
        ) ;

        if ($wpdb->insert( $tbl_name, $kv_data ) ) {
            $sub_success ='Success' ;
        }
        if ($sub_success == 'Success' ) {
            unset($sws_persion_name, $sws_persion_contact_no, $sws_persion_email, $sws_persion_registration, $sws_persion_no_plate_wanted, $sws_persion_extra_info, $sws_persion_budget );
        }
    }
}

?>


<div class="padding_article">

    <div class="article-content" style="line-height: 3em;">
        <?php
        if($sub_success == 'Success') {
            echo '<div class="success">' . __( 'Thank you we will get back you soon.', 'post_new' ) . '</div>';
            $sub_success = null;
        }
        if (isset($errors) && is_array($errors)&&sizeof($errors)>0 && $errors->get_error_code()) :
            echo '<ul class="errors">';
            foreach ($errors->errors as $error) {
                echo '<li>'.$error[0].'</li>';
            }
            echo '</ul>';
        endif;
        ?>
        <h2>Feedback form</h2>

        <span style="color: #000000;">If you are searching for a plate and it is not on our list, then fill in the form below. We will then search our extensive resources and endevour to get it as soon as we can.
 <form name="FindAPlate" id="FindAPlate" method="post" action="" >
 <h3 class="cf_text">Your Details</h3>
	<table name="form_table_find_aPlate" >
		<tr> <td>Name*</td><td> <input  maxlength="150" size="30" title="" id="sws_persion_name" name="sws_persion_name" type="text" /></td> </tr>
		<tr> <td>Contact Number*</td><td> <input  maxlength="150" size="30" title="" id="sws_persion_contact_no" name="sws_persion_contact_no" type="text" /></td> </tr>
		<tr> <td>Email*</td><td> <input  maxlength="150" size="30" title="" id="sws_persion_email" name="sws_persion_email" type="text" /></td> </tr>
		 <tr> <td>Feedback</td><td><?php $kv_editor_args =  array('media_buttons' => false , 'teeny' => true ); wp_editor( '', 'sws_feedback',  $kv_editor_args ); ?></td> </tr>
		<tr>  <td colspan="2" style="text-align: center;"><input type="hidden" name="action" value="submit-a-plate" > <input value="Submit" name="button_9" type="submit" /> </td>  </tr>
	</table>
</form>
<?php 	get_footer();	?>
