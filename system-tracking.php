<?php

global $wpdb;
$result = $wpdb->get_results( 
                $wpdb->prepare(
                            "SELECT * FROM user_doc_tracking",' '
                )
);

echo "<pre>"; print_r($result); echo "</pre>";

if(isset($_POST["cari"])) {
	$no_doc = $_POST["keyword"];
        var_dump($no_doc);
        echo "<br>";
        $result1 = $wpdb->get_results( "SELECT * FROM `user_doc_tracking` WHERE `doc_num` = '$no_doc' ORDER BY `doc_log` ASC");
        var_dump($result1[0]->cur_location);
       echo "<br>";

       foreach ($result1 as $row) {
      $input[]=$row->item;
      }
       var_dump($input);
       echo "<br>";

       //$input = array(4, "4", "3", 4, 3, "3");
       $item = array_unique($input);
       var_dump($result2);
       echo "<br>";
}

echo "<style>";
echo "body {font-family: Arial;}";
echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";

echo "<body>";

echo "<h1>Online Tracking</h1>";
echo "<h2>Gunung Mas Samudra Group</h2>";
echo "<br>";
echo "<form action=\"\" method=\"post\">";
echo "<input type=\"str\" name=\"keyword\" size=\"40\" autofocus placeholder=\"masukan nomor dokumen\" autocomplete=\"off\">";
echo "<button type=\"submit\" name=\"cari\">Cari!</button>";
echo "</form>";
echo"<br>";
echo "<h4>No. Document : ".($result1[0]->doc_num)."      ETA : ".($result1[0]->eta)."</h4>";
echo "<h4>Origin : ".($result1[0]->origin)."      Destination : ".($result1[0]->destination)."</h4>";
echo "<h4>Shipper : ".($result1[0]->shipper)."      Consignee : ".($result1[0]->consignee)."</h4>";

echo "<div class=\"table_container\"><table>";
echo "<tr>
<th style=\"padding-left:10px;\">Date</th>
<th>Status</th>
<th>Current Location</th>
<th>Flat Number</th>
<th>Transportation</th>
<th>Agent</th>
</tr>";
foreach ($result1 as $row) {
	echo "<tr>
<td>" . $row->date . "</td>
<td>" . $row->status . "</td>
<td>" . $row->cur_location . " </td>
<td>" . $row->flat_num . " </td>
<td>" . $row->transportation . " </td>
<td>" . $row->agent. " </td>
</tr>";
}
echo "</table></div>";
?>
