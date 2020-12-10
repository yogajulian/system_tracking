<?php

echo "<h1>Online Cargo Tracking</h1>";
echo "<h1>Gunung Mas Samudra Group</h1>";

global $wpdb;

if(isset($_POST["cari"])) {
	$username = $_POST["username"];
	$password = $_POST["passwordd"];

        $result = $wpdb->get_results( "SELECT * FROM ot_users WHERE username = '$username' ")[0];
        $num_row=(sizeof($result));
        if( $num_row > 0) {
		//cek pasword
		
		if ($password === $result->password) {

			$no_doc = $_POST["keyword"];
        	$tab_doc_num = $wpdb->get_results( "SELECT * FROM `user_doc_tracking` WHERE `doc_num` = '$no_doc' ORDER BY `doc_log` ASC");

			$num_row=(sizeof($tab_doc_num));
			if( $num_row > 0) {
			
                        echo "<h3>Howdy, " . $result->user_nickname . "!</h3>";
                        echo "<h4> You find your cargo status bellow</h4>";
            } else {
echo "<body>";
	
echo "<p style='color: red; font-style: italic;'>document not found</p>";

echo "	<form action=' ' method='post'>
		<ul>
                        <li>
				<label for='username'>username :</label>
				<input type='text' name='username' id='username' autocomplete='off'>
			</li>
			<li>
				<label for='password'>Password :</label>
				<input type='password' name='passwordd' id='password' autocomplete='off'>
			</li>
			<li>
				<input type='text' name='keyword' size='40' autofocus placeholder='masukan nomor dokumen' autocomplete='off'>
                                <button type=\"submit\" name=\"cari\">Cari!</button>
			</li>
		</ul> 

	</form>
</body>
</html>"; 
} 

		} else { 
$error = true;
echo "<body>";
	if(isset($error)) { 
echo "<p style='color: red; font-style: italic;'>username atau password salah</p>";
         }

echo "	<form action=' ' method='post'>
		<ul>
                        <li>
				<label for='username'>username :</label>
				<input type='text' name='username' id='username' autocomplete='off'>
			</li>
			<li>
				<label for='password'>Password :</label>
				<input type='password' name='passwordd' id='password' autocomplete='off'>
			</li>
			<li>
				<input type='text' name='keyword' size='40' autofocus placeholder='masukan nomor dokumen' autocomplete='off'>
                                <button type=\"submit\" name=\"cari\">Cari!</button>
			</li>
		</ul> 

	</form>
</body>
</html>"; 
} 
} else {
$error = true;
echo "<body>";
	if(isset($error)) { 
echo "<p style='color: red; font-style: italic;'>username atau password salah</p>";
         }

echo "	<form action=' ' method='post'>
		<ul>
                        <li>
				<label for='username'>username :</label>
				<input type='text' name='username' id='username' autocomplete='off'>
			</li>
			<li>
				<label for='password'>Password :</label>
				<input type='password' name='passwordd' id='password' autocomplete='off'>
			</li>
			<li>
				<input type='text' name='keyword' size='40' autofocus placeholder='masukan nomor dokumen' autocomplete='off'>
                                <button type=\"submit\" name=\"cari\">Cari!</button>
			</li>
		</ul> 

	</form>
</body>
</html>"; 
} 
} else {
echo "<body>";

echo "	<form action=' ' method='post'>
		<ul>
                        <li>
				<label for='username'>username :</label>
				<input type='text' name='username' id='username' autocomplete='off'>
			</li>
			<li>
				<label for='password'>Password :</label>
				<input type='password' name='passwordd' id='password' autocomplete='off'>
			</li>
			<li>
				<input type='text' name='keyword' size='40' autofocus placeholder='masukan nomor dokumen' autocomplete='off'>
                                <button type=\"submit\" name=\"cari\">Cari!</button>
			</li>
		</ul> 

	</form>
</body>
</html>";
} 
 ?>