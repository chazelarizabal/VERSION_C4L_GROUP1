<?php
			
			/*add biller for customer*/
			if(isset($_POST['Submit'])){
				$connMain = oci_connect("mainbank", "kayato1");
				$stid3 = oci_parse($connMain,
							'INSERT INTO account VALUES(:accountnum, :accounttype, :balance)'
									);
							oci_bind_by_name($stid3, ':balance', $_POST['balance']);
							oci_bind_by_name($stid3, ':accounttype', $_POST['accounttype']);
							oci_bind_by_name($stid3, ':accountnum', $_POST['accountnum']);
							oci_execute($stid3);
							oci_close($connMain);
				$connMain = oci_connect("mainbank", "kayato1");
				$stid4 = oci_parse($connMain,
							'INSERT INTO atm VALUES(:accountnum, :pin)'
									);
							oci_bind_by_name($stid4, ':pin', $_POST['pin']);
							oci_bind_by_name($stid4, ':accountnum', $_POST['accountnum']);
							oci_execute($stid4);
			}
				
?>
<html>
	<head>
		<title>	Add Account</title>
	</head>
	<body>
		<form name = "addAccount_form" method ="post" action = "addAccount.php">
			Account Number: <input type="text" name="accountnum" maxlength="10"> 
			Account type: <select name = "accounttype">
				<option value="atm"> ATM </option>
				<option value="personal"> Personal Savings </option>
				<option value="company"> Company Savings </option>
			</select><br />
			Pin number: <input type="text" name="pin" maxlength="4"/>
			Initial Deposit: <input type="text" name="balance" maxlength="10"/>	<!--see max-->
			<input type="submit" name="Submit" value="Submit" />	
		</form>
	</body>
</html>
