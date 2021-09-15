<!-- <!DOCTYPE html>
<html>
<head>
	<title>403 Forbidden</title>
</head>
<body>

<p>Directory access is forbidden.</p>

</body> -->
</html>

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function index(){
		redirect ('auth/login');
	}
}