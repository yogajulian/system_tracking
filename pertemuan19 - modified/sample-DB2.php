<?php

global $wpdb;
global $user_ID;

echo "<style>";
echo "body {font-family: Arial;}";
echo ".table_container { padding: 10px 12px 0px 12px;  border: 1px solid #ccc;  }";
echo ".table_container th { background-color:lightblue; color:white; font-weight:bold; border-left: 1px solid white;}";
echo "</style></head>";

if(isset($_POST["cari"])) {
  $cari = $_POST["cari"];
	$no_doc = $_POST["keyword"];
  $userLevel = $_POST["userLevel"];
    
      $tab_doc_num = $wpdb->get_results( "SELECT * FROM `user_doc_tracking` WHERE `doc_num` = '$no_doc' ORDER BY `doc_log` ASC");

      foreach ($tab_doc_num as $row_doc_num) {
      $tab_doc_num_item[]=$row_doc_num->item_id;
      }
    
      $tab_unique_item = array_unique($tab_doc_num_item);

foreach ($tab_unique_item as $row_unique_item) {
      $tab_item = $wpdb->get_results("SELECT * FROM `user_doc_tracking` WHERE `item_id` = '$row_unique_item' ORDER BY `doc_log` ASC");

      echo "<div style='overflow: auto;width: 100%;'>
            <div style='width:200px;float: left;'> Item ID : ".($tab_item[0]->item_id)."</div>

            <div style='width:200px;float: left;'></div>
            <div style='width:200px;float: left;'>Item : ".($tab_item[0]->item)."</div>

            <div style='width:200px;float: left;'></div>
            <div style='width:200px;float: left;'>Quantity : ".($tab_item[0]->quantity)."</div>
            
            <div style='width:200px;float: left;'></div>
            <div style='width:200px;float: left;'>Seal : ".($tab_item[0]->seal)."</div>";
      if ($userLevel > 0) {
            echo "<div style='width:200px;float: left;'></div>
                  <a href='https://www.gms-indonesia.com/tambah/?id=".$user_ID."'>input status</a></div>";
            }

      echo "<div class='table_container'><table>
            <tr>
            <th style='padding-left:10px;'>Date</th>
            <th>Status</th>
            <th>Current Location</th>
            <th>Flat Number</th>
            <th>Transportation</th>";
      if ($userLevel > 0) {
      echo "<th>Action</th>
            </tr>";
            }
      foreach ($tab_item as $row_item) {
            echo "<tr>
                  <td>" . $row_item->date . "</td>
                  <td>" . $row_item->status . "</td>
                  <td>" . $row_item->cur_location . " </td>
                  <td>" . $row_item->flat_num . " </td>
                  <td>" . $row_item->transportation . " </td>";
            if ($userLevel > 0) {
            echo "<td> <a href='https://www.gms-indonesia.com/edit/?id=" .$user_ID. "'>edit</a> 
                  <form action=' ' method='post'>
                  <input type='hidden' name='cari' value='".$cari."'>
                  <input type='hidden' name='userLevel' value='".$userLevel."'>
                  <a href='' type='submit' name='delete onclick='return confirm(\'yakin?\')'>delete</a>
                  </form>
                  </td>";
                }
            echo "</tr>";
          }
      echo "</table></div>";
      echo"<br>";
    }
}                 
?>