	public function register()
	{

		if(isset($this->session->userdata['logged_in']))
		{
			$this->checklogin();
		}

		$register=$this->input->post('register');
		$register_email= $this->input->post('email');

		if (isset($register) && $register_email !=""){

		$data = array(
		'username' => $this->input->post('username'),
		'mobile' => $this->input->post('mobile'),
		'email' => $this->input->post('email')

		);


		//check/***************************************************cllg name *****************************************


		$cllg="@kiet.edu";


		//check/***************************************************cllg name *****************************************


		if (strpos($data['email'], $cllg) != false) {
		# code...


		$result = $this->login_database->already_register_check($data);

		if ($result == false)
		{


			for ($i = 0; $i < 60; $i++) {

			$arr[$i]=$i;
		}

		shuffle($arr);
		$pass="";
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		for ($i = 0; $i < 15; $i++) {
		$n = $arr[$i];
		$pass.= $alphabet[$n];
	}


	$name=$data['username'];
	$email=$data['email'];
	$password=$pass;
	$mobile=$data['mobile'];

	$this->load->library('email');
	$this->email->from('innovatorsinnovation2016@gmail.com', 'E-learning');


	$this->email->to($email,$name);
	$this->email->subject('Registered Successfully For E-learning');



	$message='<html >
	<head>
		<style>

		* {
			margin: 0;
			padding: 0;
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			box-sizing: border-box;
			font-size: 14px;
		}

		img {
			max-width: 100%;
		}

		body {
			-webkit-font-smoothing: antialiased;
			-webkit-text-size-adjust: none;
			width: 100% !important;
			height: 100%;
			line-height: 1.6;
		}


		table td {
			vertical-align: top;
		}

							/* -------------------------------------
							BODY & CONTAINER
							------------------------------------- */
							body {
								background-color: #f6f6f6;
							}

							.body-wrap {
								background-color: #f6f6f6;
								width: 100%;
							}

							.container {
								display: block !important;
								max-width: 600px !important;
								margin: 0 auto !important;
								/* makes it centered */
								clear: both !important;
							}

							.content {
								max-width: 600px;
								margin: 0 auto;
								display: block;
								padding: 20px;
							}

							/* -------------------------------------
							HEADER, FOOTER, MAIN
							------------------------------------- */
							.main {
								background: #fff;
								border: 1px solid #e9e9e9;
								border-radius: 3px;
							}

							.content-wrap {
								padding: 20px;
							}

							.content-block {
								padding: 0 0 20px;
							}

							.header {
								width: 100%;
								margin-bottom: 20px;
							}

							.footer {
								width: 100%;
								clear: both;
								color: #999;
								padding: 20px;
							}
							.footer a {
								color: #999;
							}
							.footer p, .footer a, .footer unsubscribe, .footer td {
								font-size: 12px;
							}

							/* -------------------------------------
							TYPOGRAPHY
							------------------------------------- */
							h1, h2, h3 {
								font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
								color: #000;
								margin: 40px 0 0;
								line-height: 1.2;
								font-weight: 400;
							}

							h1 {
								font-size: 32px;
								font-weight: 500;
							}

							h2 {
								font-size: 24px;
							}

							h3 {
								font-size: 18px;
							}

							h4 {
								font-size: 14px;
								font-weight: 600;
							}

							p, ul, ol {
								margin-bottom: 10px;
								font-weight: normal;
							}
							p li, ul li, ol li {
								margin-left: 5px;
								list-style-position: inside;
							}

							/* -------------------------------------
							LINKS & BUTTONS
							------------------------------------- */
							a {
								color: #1ab394;
								text-decoration: underline;
							}

							.btn-primary {
								text-decoration: none;
								color: #FFF;
								background-color: #1ab394;
								border: solid #1ab394;
								border-width: 5px 10px;
								line-height: 2;
								font-weight: bold;
								text-align: center;
								cursor: pointer;
								display: inline-block;
								border-radius: 5px;
								text-transform: capitalize;
							}

							/* -------------------------------------
							OTHER STYLES THAT MIGHT BE USEFUL
							------------------------------------- */
							.last {
								margin-bottom: 0;
							}

							.first {
								margin-top: 0;
							}

							.aligncenter {
								text-align: center;
							}

							.alignright {
								text-align: right;
							}

							.alignleft {
								text-align: left;
							}

							.clear {
								clear: both;
							}

							/* -------------------------------------
							ALERTS
							Change the class depending on warning email, good email or bad email
							------------------------------------- */
							.alert {
								font-size: 16px;
								color: #fff;
								font-weight: 500;
								padding: 20px;
								text-align: center;
								border-radius: 3px 3px 0 0;
							}
							.alert a {
								color: #fff;
								text-decoration: none;
								font-weight: 500;
								font-size: 16px;
							}
							.alert.alert-warning {
								background: #f8ac59;
							}
							.alert.alert-bad {
								background: #ed5565;
							}
							.alert.alert-good {
								background: #1ab394;
							}

							/* -------------------------------------
							INVOICE
							Styles for the billing table
							------------------------------------- */
							.invoice {
								margin: 40px auto;
								text-align: left;
								width: 80%;
							}
							.invoice td {
								padding: 5px 0;
							}
							.invoice .invoice-items {
								width: 100%;
							}
							.invoice .invoice-items td {
								border-top: #eee 1px solid;
							}
							.invoice .invoice-items .total td {
								border-top: 2px solid #333;
								border-bottom: 2px solid #333;
								font-weight: 700;
							}

							/* -------------------------------------
							RESPONSIVE AND MOBILE FRIENDLY STYLES
							------------------------------------- */
							@media only screen and (max-width: 640px) {
								h1, h2, h3, h4 {
									font-weight: 600 !important;
									margin: 20px 0 5px !important;
								}

								h1 {
									font-size: 22px !important;
								}

								h2 {
									font-size: 18px !important;
								}

								h3 {
									font-size: 16px !important;
								}

								.container {
									width: 100% !important;
								}

								.content, .content-wrap {
									padding: 10px !important;
								}

								.invoice {
									width: 100% !important;
								}
							}

						</style>
					</head>

					<body>

						<table class="body-wrap">
							<tr>
								<td></td>
								<td class="container" width="600">
									<div class="content">
										<table class="main" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="alert alert-good">
													Info: Your Login Credentials.
												</td>
											</tr>
											<tr>
												<td class="content-wrap">
													<table width="100%" cellpadding="0" cellspacing="0">
														<tr>
															<td class="content-block">

															</td>
														</tr>
														<tr>
															<td class="content-block">
																';

																$message.="E-mail:".$email;
																$message.="<br>Password:".$password;
																$message.="<br>Username:".$name;

																$message.='
															</td>
														</tr>
														<tr>
															<td class="content-block">
																<a href="';
																$message.=  base_url();
																$message.='
																" class="btn-primary">Login Your Account</a>
															</td>
														</tr>
														<tr>
															<td class="content-block">
																Thanks for choosing E-learning.
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<div class="footer">
											<table width="100%">
												<tr>
													<td class="aligncenter content-block"><a href="innovatorsinnovation.xyz"><small>InnovatorsInnovation &copy; 2017</small></a></td>
												</tr>
											</table>
										</div></div>
									</td>
									<td></td>
								</tr>
							</table>

						</body>
						</html>
						';


						$this->email->message($message);

						try{

						$this->email->send();

						$err = array('error' =>"*Registered Successfully Kindly Check Your College E-mail ID" ,'color' =>"green" );
						$this->load->view('landing/index',$err);

						$data_insert = array(
						'username' => $name,
						'password' => $password,
						'email' =>$email
						);

						$admin_check_status=$this->login_database->admin_check($email);
						if ($admin_check_status ==TRUE) {
						# code...
						$data_insert['rank']="admin";
					}
					if ($admin_check_status ==false) {
					# code...
					$data_insert['rank']="student";
				}

				$this->db->insert('login', $data_insert);
				$result = $this->login_database->recent_register($email);
				$data_insert_login_info=array(
				'user_id' => $result[0]->user_id,
				'email'=>$email,
				'mobile'=>$mobile
				);
				$this->db->insert('login_info', $data_insert_login_info);




			}

			catch(Exception $e){
			echo $e->getMessage();


			$err = array('error' =>"*Kindly Try After Some Time Server Busy" ,'color' =>"red" );
			$this->load->view('landing/register',$err);

		}



	}

	else
	{

		$err = array('error' =>"*E-mail Already Registered Kindly Log In" ,'color' =>"red" );
		$this->load->view('landing/index',$err);
	}
}

else
{

	$err = array('error' =>"*Kindly Enter Your College E-mail Id" ,'color' =>"red" );
	$this->load->view('landing/register',$err);
}
}
else
{

	$err = array('error' =>"*Kindly Fill The Entries" ,'color' =>"red" );
	$this->load->view('landing/register',$err);
}

}

///////////////////////////////////////////////////////////////////////////////////////////////////////////
public function forget()
{

	if(isset($this->session->userdata['logged_in']))
	{
		$this->checklogin();
	}

	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');

	$forget=$this->input->post('forget');
	$test= $this->input->post('username');

	if (isset($forget) && $test!=''){


	$result = $this->login_database->forget($test);

	if($result != false )
	{


		$email=$result[0]->email;
		$name=$result[0]->username;

		$this->load->library('email');
		$this->email->from('innovatorsinnovation2016@gmail.com', 'E-learning');


		$this->email->to($email,$name);
		$this->email->subject('Login  Credentials For E-learning');



		$message='<html >
		<head>
			<style>

			* {
				margin: 0;
				padding: 0;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				box-sizing: border-box;
				font-size: 14px;
			}

			img {
				max-width: 100%;
			}

			body {
				-webkit-font-smoothing: antialiased;
				-webkit-text-size-adjust: none;
				width: 100% !important;
				height: 100%;
				line-height: 1.6;
			}


			table td {
				vertical-align: top;
			}

							/* -------------------------------------
							BODY & CONTAINER
							------------------------------------- */
							body {
								background-color: #f6f6f6;
							}

							.body-wrap {
								background-color: #f6f6f6;
								width: 100%;
							}

							.container {
								display: block !important;
								max-width: 600px !important;
								margin: 0 auto !important;
								/* makes it centered */
								clear: both !important;
							}

							.content {
								max-width: 600px;
								margin: 0 auto;
								display: block;
								padding: 20px;
							}

							/* -------------------------------------
							HEADER, FOOTER, MAIN
							------------------------------------- */
							.main {
								background: #fff;
								border: 1px solid #e9e9e9;
								border-radius: 3px;
							}

							.content-wrap {
								padding: 20px;
							}

							.content-block {
								padding: 0 0 20px;
							}

							.header {
								width: 100%;
								margin-bottom: 20px;
							}

							.footer {
								width: 100%;
								clear: both;
								color: #999;
								padding: 20px;
							}
							.footer a {
								color: #999;
							}
							.footer p, .footer a, .footer unsubscribe, .footer td {
								font-size: 12px;
							}

							/* -------------------------------------
							TYPOGRAPHY
							------------------------------------- */
							h1, h2, h3 {
								font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
								color: #000;
								margin: 40px 0 0;
								line-height: 1.2;
								font-weight: 400;
							}

							h1 {
								font-size: 32px;
								font-weight: 500;
							}

							h2 {
								font-size: 24px;
							}

							h3 {
								font-size: 18px;
							}

							h4 {
								font-size: 14px;
								font-weight: 600;
							}

							p, ul, ol {
								margin-bottom: 10px;
								font-weight: normal;
							}
							p li, ul li, ol li {
								margin-left: 5px;
								list-style-position: inside;
							}

							/* -------------------------------------
							LINKS & BUTTONS
							------------------------------------- */
							a {
								color: #1ab394;
								text-decoration: underline;
							}

							.btn-primary {
								text-decoration: none;
								color: #FFF;
								background-color: #1ab394;
								border: solid #1ab394;
								border-width: 5px 10px;
								line-height: 2;
								font-weight: bold;
								text-align: center;
								cursor: pointer;
								display: inline-block;
								border-radius: 5px;
								text-transform: capitalize;
							}

							/* -------------------------------------
							OTHER STYLES THAT MIGHT BE USEFUL
							------------------------------------- */
							.last {
								margin-bottom: 0;
							}

							.first {
								margin-top: 0;
							}

							.aligncenter {
								text-align: center;
							}

							.alignright {
								text-align: right;
							}

							.alignleft {
								text-align: left;
							}

							.clear {
								clear: both;
							}

							/* -------------------------------------
							ALERTS
							Change the class depending on warning email, good email or bad email
							------------------------------------- */
							.alert {
								font-size: 16px;
								color: #fff;
								font-weight: 500;
								padding: 20px;
								text-align: center;
								border-radius: 3px 3px 0 0;
							}
							.alert a {
								color: #fff;
								text-decoration: none;
								font-weight: 500;
								font-size: 16px;
							}
							.alert.alert-warning {
								background: #f8ac59;
							}
							.alert.alert-bad {
								background: #ed5565;
							}
							.alert.alert-good {
								background: #1ab394;
							}

							/* -------------------------------------
							INVOICE
							Styles for the billing table
							------------------------------------- */
							.invoice {
								margin: 40px auto;
								text-align: left;
								width: 80%;
							}
							.invoice td {
								padding: 5px 0;
							}
							.invoice .invoice-items {
								width: 100%;
							}
							.invoice .invoice-items td {
								border-top: #eee 1px solid;
							}
							.invoice .invoice-items .total td {
								border-top: 2px solid #333;
								border-bottom: 2px solid #333;
								font-weight: 700;
							}

							/* -------------------------------------
							RESPONSIVE AND MOBILE FRIENDLY STYLES
							------------------------------------- */
							@media only screen and (max-width: 640px) {
								h1, h2, h3, h4 {
									font-weight: 600 !important;
									margin: 20px 0 5px !important;
								}

								h1 {
									font-size: 22px !important;
								}

								h2 {
									font-size: 18px !important;
								}

								h3 {
									font-size: 16px !important;
								}

								.container {
									width: 100% !important;
								}

								.content, .content-wrap {
									padding: 10px !important;
								}

								.invoice {
									width: 100% !important;
								}
							}

						</style>
					</head>

					<body>

						<table class="body-wrap">
							<tr>
								<td></td>
								<td class="container" width="600">
									<div class="content">
										<table class="main" width="100%" cellpadding="0" cellspacing="0">
											<tr>
												<td class="alert alert-good">
													Info: Your Login Credentials.
												</td>
											</tr>
											<tr>
												<td class="content-wrap">
													<table width="100%" cellpadding="0" cellspacing="0">
														<tr>
															<td class="content-block">

															</td>
														</tr>
														<tr>
															<td class="content-block">
																';

																$message.="E-mail:".$email;
																$message.="<br>Password:".$result[0]->password;
																$message.="<br>Username:".$name;

																$message.='
															</td>
														</tr>
														<tr>
															<td class="content-block">
																<a href="';
																$message.=  base_url();
																$message.='
																" class="btn-primary">Login Your Account</a>
															</td>
														</tr>
														<tr>
															<td class="content-block">
																Thanks for choosing E-learning.
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<div class="footer">
											<table width="100%">
												<tr>
													<td class="aligncenter content-block"><a href="innovatorsinnovation.xyz"><small>InnovatorsInnovation &copy; 2017</small></a></td>
												</tr>
											</table>
										</div></div>
									</td>
									<td></td>
								</tr>
							</table>

						</body>
						</html>
						';










						$this->email->message($message);

						try{

						$this->email->send();

						$err = array('error' =>"*Password send Successfully" ,'color' =>"green" );
						$this->load->view('landing/index',$err);
					}

					catch(Exception $e){
					echo $e->getMessage();


					$err = array('error' =>"*Kindly Try After Some Time Server Busy" ,'color' =>"red" );
					$this->load->view('landing/forget',$err);

				}
			}
			else
			{
				$err = array('error' =>"*Kindly Register First (E-mail Not Registered)" ,'color' =>"red" );
				$this->load->view('landing/register',$err);
			}

		}
		else
		{
			$err = array('error' =>"*Kindly Fill The Entries" ,'color' =>"red" );
			$this->load->view('landing/forget',$err);
		}

	}