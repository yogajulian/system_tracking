 <?php

global $wpdb;

if(isset($_POST["cari"])) {
	echo "<style>";
	echo "body {font-family: Arial;}";
	
	echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
	echo "</style></head>";

	echo "<body>";

	$no_doc = $_POST["keyword"];
        $tab_doc_num = $wpdb->get_results( "SELECT * FROM `user_doc_tracking` WHERE `doc_num` = '$no_doc' ORDER BY `doc_log` ASC");

	$num_row=(sizeof($tab_doc_num));
		if( $num_row > 0) {
			echo "<p>ETA : ".($tab_doc_num[0]->eta)."</p>";
			echo "<p>Destination : ".($tab_doc_num[0]->destination)."</p>";
			echo "<p>Consignee : ".($tab_doc_num[0]->consignee)."</p>";
			}
	echo "</body>";                        
	} 
?>

