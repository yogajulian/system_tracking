
<?php
global $wpdb;
global $user_ID;

if($user_ID != 0) {
	$userLevelRow = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `user_id` = '$user_ID' AND `meta_key` = 'wp_user_level' ")[0];
	$nicknameRow = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `user_id` = '$user_ID' AND `meta_key` = 'nickname' ")[0];
	$userLevel = $userLevelRow->meta_value;
	$nickname = $nicknameRow->meta_value;

if(!isset($_POST["cari"])) {
	echo "<p> NB : You can find your cargo status from the search box bellow!</p>";
	}

if(isset($_POST["cari"])) {
			$noDoc = $_POST["keyword"];
        	$tabDocNum = $wpdb->get_results( "SELECT * FROM `user_doc_tracking` WHERE `doc_num` = '$noDoc' ORDER BY `doc_log` ASC");
        	$userDataRow = $wpdb->get_results( "SELECT * FROM `ot_users` WHERE `nickname` = '$nickname' ");
				$doc = $wpdb->get_results( "SELECT * FROM `ot_users` WHERE `nickname` = '$nickname' ");
			$numRow=(sizeof($tabDocNum));
			if( $numRow == 0) {
				echo "<p style='color: red; font-style: italic;'>document not found</p>";
				echo "<p> NB : You can find your cargo status by filling up document number bellow!</p>";
				}
			elseif( $userLevel > 0 OR $userData->affiliation == $tabDocNum->consignee OR $userData->affiliation == $tabDocNum->consignee2) {
				} 
			else {
				echo "<p style='color: red; font-style: italic;'>you have no credential for this document</p>";
				echo "<p> NB : You can find your cargo status by filling up document number bellow!</p>";
				}
	}

echo "	<form action=' ' method='post'>
				<input type='hidden' name='userLevel' value='".$userLevel."'>
				<input type='text' name='keyword' size='40' autofocus placeholder='enter your document number' autocomplete='off'>
                <button type='submit' name='cari'>Find!</button>
		</form>"; 
	}
?>