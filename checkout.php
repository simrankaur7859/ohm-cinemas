<?php

session_start();
include('connect.php');
if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . 'response.php';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OHM CINEMA</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<!-- <script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> -->
<!-- BOLT Production/Live //-->
 <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script> 

</head>

<body>

	<div class="col-md-1 navbar-fixed-top left">
		<p style="margin-top:70px;" class="active"><a href="index.php"><i class="fa-fw fa-3x fa fa-home"></i>HOME</a></p>
		<p><a href="index.php"><i class="fa-fw fa-3x fa fa-youtube-play"></i>MOVIES</a></p>
		<p><a href="ticket.php"><i class="fa-fw fa-3x fa fa-ticket"></i>TICKET</a></p>
		
		<p><a href=""><i class="fa-fw fa-3x fa fa-envelope"></i>CONTACT</a></p>

	</div>

	<div class="col-md-11 col-md-offset-1 right">
			<div class="col-md-12 top-bar" style="height:69px;">
			      <div class="col-md-3">
			      	<!-- <h3>OHM CINEMA</h3> -->
			      		<img src="images/logo.png" width="100">
			      </div>
			      <div class="col-md-6 ">
			      	<form>
				      	<input type="text" placeholder="Search" class="search"><button  class="srch"><i class="fa fa-search"></i></button>
			      	</form>
			      </div>

			      <div class="col-md-3">
					<?php
						if(!isset($_SESSION['uid']))
						{
					?>
			      	<span class="btn link" id="login" data-toggle="modal" data-target="#myModal"><i class="fa fa-sign-in"></i> Sign In</span>
			      	<span class="btn link" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user-plus"></i> Sign Up</span>
			    		<?php
						}
						else
						{
							$cmd = "select name from users_tbl where uid=".$_SESSION['uid'];
							$res  = mysqli_query($conn, $cmd);
							$row  = mysqli_fetch_array($res);
						?>
						<a class="btn link" href="login.php"><i class="fa fa-user"></i> <?php echo strtoupper($row['name']); ?></a>
						<a class="btn link" href="logout.php"><i class=" fa fa-sign-out"></i> LOGOUT</a>
			     		<?php		
						}
					?>	
			      </div>
			</div>
			
	<div class="clearfix"></div>

	<div class="col-md-12 checkout">

		<div class="col-md-7 text-center">
			<img src="images/ads.jpg" alt="" width="70%" />
		</div>
		<div class="col-md-4 col-md-offset-1 pay">
		<?php //echo $_SESSION['movie']; ?>
		<h5>Booking Summary</h5>
		<br>
		<p><strong><?php echo strtoupper($_SESSION['movie']); ?></strong></p>
		<p><span>Ticket- <?php echo $_SESSION['seats']; ?></span> Rs. <?php echo $_SESSION['amt'].".00"; ?></p>

		<p style="color:#999">	<span>Internet handling fees</span> Rs. 0.00</p>
		<hr>
		<p><span>Sub total</span> Rs. <?php echo $_SESSION['amt'].".00"; ?></p>
		<h4><span>Amount Payable</span> Rs. <?php echo $_SESSION['amt'].".00"; ?></h4>
	<form action="#" id="payment_form" method="post">

    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div class="col-md">
  
    <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="mwr6ryfP" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="RWXex7PB7f" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="amount" name="amount" placeholder="Amount" value="<?php echo $_SESSION['amt']; ?>" /></span>    
    </div>
    
    <div class="dv">
    
    <span><input type="hidden" id="pinfo" name="pinfo" placeholder="Product Info" value="<?php echo $_SESSION['seats']; ?>" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="fname" name="fname" placeholder="Name" value="<?php echo $_SESSION['name']; ?>" /></span>
    </div>
    
    <div class="dv">
   
    <span><input type="hidden" id="email" name="email" placeholder="Email ID" value="<?php echo $_SESSION['email']; ?>" /></span>
    </div>
    
    <div class="dv">
  
    <span><input type="hidden" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<?php echo $_SESSION['mobile']; ?>" /></span>
    </div>
    
    <div class="dv">
  
    <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
    </div>
    
    
    <div><input type="submit" value="PROCEED" onclick="launchBOLT(); return false;" /></div>
	</form>
	</div>

</div>
<?php include('footer.php'); ?>


<script type="text/javascript"><!--
//$('#payment_form').bind('keyup blur', function(){
	$(document).ready(function(){
	$.ajax({
            url: 'checkout.php',
            type: 'post',
              data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>	

</body>
</html>
	
