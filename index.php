<?php

require "common/db.req.php";

$page = 'index';

if (isset($_REQUEST['page'])) {
	if (file_exists("controllers/" . $_REQUEST['page'] . ".php")) {
		$page = $_REQUEST['page'];
	}
}

require "controllers/$page.php";

?>