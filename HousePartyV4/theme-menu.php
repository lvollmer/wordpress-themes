<?php 
function mytheme_add_admin()
{
    global $themename, $shortname, $options;

    if ($_GET['page'] == basename(__FILE__))
	{    
        if ($_REQUEST['action'] == 'save')
		{
			foreach ($options as $value)
				update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ]) );
					
            foreach ($options as $value)
			{
                if(isset($_REQUEST[$value['id']]))
					update_option( $value['id'], stripslashes($_REQUEST[ $value['id'] ])  );
				else
					delete_option( $value['id'] );
			}

			header("Location: themes.php?page=theme-menu.php&saved=true");
			die;
        } 
		
		else if($_REQUEST['action'] == 'reset')
		{
            foreach ($options as $value)
				delete_option( $value['id'] );

            header("Location: themes.php?page=theme-menu.php&reset=true");
            die;
        }
    }
    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}

function mytheme_admin()
{
	global $themename, $shortname, $options;

	if ( $_REQUEST['saved'] ) 
		echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) 
		echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
	<div class="wrap">		
		
		<form action="#" method="post">
		
		<?php
		foreach($options as $value) 
		{
			switch($value['type'])
			{
				case "title":
		?>			<br /><h2><?php echo $value['name'] ?></h2>
		<?php 		break;
		
				case "subtitle":
		?>			<h3><?php echo $value['name'] ?></h3>
		<?php 		break;
		
				case "para":
		?>			<p><?php echo $value['name'] ?></p>
		<?php 		break;
					
				case "open":
		?>			<table class="form-table"><tbody>
		<?php 		break;
					
				case "close":
		?>			</tbody></table>
		<?php 		break;
					
				case "split":
		?>			<tr valign="top"><td colspan="2"><center>- - - - - - - - - - - - - - - - - - -</center></td></tr>
		<?php 		break;
		
				case 'text':
		?>			<tr valign="top">
						<th scope="row"><?php echo $value['name']; ?></th>
						<td>
							<input 
								type="text" 
								size="50" 
								name="<?php echo $value['id']; ?>" 
								id="<?php echo $value['id']; ?>" 
								value="<?php 
									if(get_settings($value['id']) != "") 
										echo get_settings( $value['id'] ); 
									else
										echo $value['std'];?>"
							/>
							<br /><?php echo $value['desc']; ?>
						</td>
					</tr>
		<?php 		break;
		
				case 'textarea':
		?>			<tr valign="top">
						<th scope="row"><?php echo $value['name']; ?></th>
						<td>
							<textarea 
								name="<?php echo $value['id']; ?>" 
								class="code" 
								style="width: 98%; font-size: 12px;" 
								cols="60" 
								rows="10"><?php 
								if(get_settings($value['id']) != "")
									echo get_settings( $value['id'] );
								else 
									echo $value['std']; ?></textarea>
							<br /><?php echo $value['desc']; ?>
						</td>
					</tr>
		<?php 		break;
		
				case 'select':
		?>			<tr valign="top">
						<th scope="row"><?php echo $value['name']; ?></th>
						<td>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
								<?php foreach ($value['options'] as $k=>$option) { ?>
									<option <?php if($k == get_settings($value['id']) or $k == $value['std']) echo 'selected="selected"';?> value="<?php echo $k;?>"><?php echo $option; ?></option>
								<?php } ?>
							</select>
							<br /><?php echo $value['desc']; ?>
						</td>
					</tr>
		<?php		break;
		
				case 'select-cat':
		?>			<tr valign="top">
						<th scope="row"><?php echo $value['name']; ?></th>
						<td>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
								<?php $categories = get_categories("hide_empty=false"); ?>
								<?php foreach ($categories as $option) { ?>
									<option value="<?php echo $option->cat_ID; ?>" <?php if($option->cat_ID == get_settings($value['id'])) echo 'selected="selected"';?>><?php echo $option->name; ?></option>
								<?php } ?>
							</select>
							<br /><?php echo $value['desc']; ?>
						</td>
					</tr>
		<?php		break;
		
				case "checkbox":
		?>			<tr valign="top">
						<th scope="row"><?php echo $value['name']; ?></th>
						<td>
							<?php 
								if(get_settings($value['id'])) $checked = "checked=\"checked\"";
								else $checked = "";
							?>
							<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> 
							<?php echo $value['desc']; ?>
						</td>
					</tr>
		<?php 		break;
			} 
		}
?>

			<p class="submit">
				<input name="save" class="button-primary" type="submit" value="Save changes" />    
				<input type="hidden" name="action" value="save" />
			</p>
		</form>
		
		<form action="#" method="post">
			<p class="submit">
				<input name="reset" type="submit" value="Reset" />
				<input type="hidden" name="action" value="reset" />
			</p>
		</form>
	</div>

<?php
}
add_action('admin_menu', 'mytheme_add_admin');

?>