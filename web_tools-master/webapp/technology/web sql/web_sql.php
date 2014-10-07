<?php echo(__FILE__); ?>
<!-- http://www.tutorialspoint.com/html5/html5_web_sql.htm -->
<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript">
			var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
			var msg;
			db.transaction(function(tx) {
				tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
				tx.executeSql('INSERT INTO LOGS (id, log) VALUES (1, "foobar")');
				tx.executeSql('INSERT INTO LOGS (id, log) VALUES (2, "logmsg")');
				msg = '<p>Log message created and row inserted.</p>';
				document.querySelector('#status').innerHTML = msg;
			});

			db.transaction(function(tx) {
				tx.executeSql('SELECT * FROM LOGS', [], function(tx, results) {
					var len = results.rows.length, i;
					msg = "<p>Found rows: " + len + "</p>";
					document.querySelector('#status').innerHTML += msg;
					for ( i = 0; i < len; i++) {
						msg = "<p><b>" + results.rows.item(i).log + "</b></p>";
						document.querySelector('#status').innerHTML += msg;
					}
				}, null);
			});
		</script>
	</head>
	<body>
		<div id="status" name="status">
			Status Message
		</div>
	</body>
</html>

<script>
	function openDatabase(){
	//var db = openDatabase('databasename', 'versionNumber', 'textDescription', sizeOfDatabase, creationCallback;
	var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
	}

	//Execute a Query
	//create a table
	function createTable() {
	var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
	db.transaction(function(tx) {
	tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
	});
	}

	function insert() {
	var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
	db.transaction(function(tx) {
	tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
	tx.executeSql('INSERT INTO LOGS (id, log) VALUES (1, "foobar")');
	tx.executeSql('INSERT INTO LOGS (id, log) VALUES (2, "logmsg")');
	});
	}

	function insertDynamic(){

	var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
	db.transaction(function (tx) {
	tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
	tx.executeSql('INSERT INTO LOGS
	(id,log) VALUES (?, ?'), [e_id, e_log];
	});
	}

	function read(){
	var db = openDatabase('mydb', '1.0', 'Test DB', 2 * 1024 * 1024);
	db.transaction(function (tx) {
	tx.executeSql('CREATE TABLE IF NOT EXISTS LOGS (id unique, log)');
	tx.executeSql('INSERT INTO LOGS (id, log) VALUES (1, "foobar")');
	tx.executeSql('INSERT INTO LOGS (id, log) VALUES (2, "logmsg")');
	});
	db.transaction(function (tx) {
	tx.executeSql('SELECT * FROM LOGS', [], function (tx, results) {
	var len = results.rows.length, i;
	msg = "<p>Found rows: " + len + "</p>";
	document.querySelector('#status').innerHTML +=  msg;
	for (i = 0; i < len; i++){
	alert(results.rows.item(i).log );
	}
	}, null);
	});
	}
</script>
