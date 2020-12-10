<?php

global $wpdb;
$result = $wpdb->get_results( "SELECT * FROM wp_seafreight");

if(isset($_POST["cari"])) {
	$mahasiswa = $_POST["keyword"];
        $result1 = $wpdb->get_results( "SELECT * FROM wp_seafreight WHERE No_BL=$mahasiswa");
}

echo "<style>";
echo "body {font-family: Arial;}";
echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";/

echo "<body>";

echo "<h1>Online Tracking</h1>";
echo "<h2>Gunung Mas Samudra Group</h2>";
echo "<br>";
echo "<form action=\"\" method=\"post\">";
echo "<input type=\"text\" name=\"keyword\" size=\"40\" autofocus placeholder=\"masukan nomor dokumen\" autocomplete=\"off\">";
echo "<button type=\"submit\" name=\"cari\">Cari!</button>";
echo "</form>";

echo "<div class=\"table_container\"><table>";
echo "<tr>
<th style=\"padding-left:10px;\">No. BL</th>
<th>Comodity</th>
<th>Status</th>
<th>Location</th>
</tr>";
foreach ($result1 as $row) {
	echo "<tr>
<td>" . $row->No_BL . "</td>
<td>" . $row->Comodity . "</td>
<td>" . $row->Status . " </td>
<td>" . $row->Location . " </td>
</tr>";
}
echo "</table></div>";
?>