<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Pet Book</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="clearfix">
			<div class="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="LOGO" height="202" width="209"></a>
			</div>
			<ul class="navigation">
				<li class="active">
					<a href="homepage.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="accountcreation.php">Account Creation Page</a>
				</li>
				<li>
					<a href="findapet1.php">Find a Pet</a>
				</li>
				<li>
					<a href="findashelter.php">Find a Shelter</a>	
				</li>
                                <li>
					<a href="searchforvet.php">Find a Vet</a>	
				</li>
				<li>
				<a href="findasitter.php">Find a Sitter</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>
	</div>
	<div id="contents">
		<div class="clearfix">
			<div class="sidebar">
				<div>
					<h2>Contact Info</h2>
					<ul class="contact">
						<li>
							<p>
								<span class="home"></span> <em>Pet Book<br></em> the address city, state 1111
							</p>
						</li>
						<li>
							<p class="phone">
								Phone: (+20) 000 222 999
							</p>
						</li>
						<li>
							<p class="fax">
								Fax: (+20) 000 222 988
							</p>
						</li>
						<li>
							<p class="mail">
								Email: info@petbook.com
							</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="main">
				<h1>Contact</h1>
				<h2>Send Us a Quick Message</h2>
				<p>
					We will get back to you as soon as possible. If you are submitting credentials, write "CREDENTIALS" in the subject line and we will process them. Upload file before filling in the form. Also, include your username in the message.
				</p>
                                <?php // upload.php
  echo <<<_END
    <html><head><title>PHP Form Upload</title></head><body>
    <form method='post' action='contact.php' enctype='multipart/form-data'>
    Select File: <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'>
    </form>
_END;

  if ($_FILES)
  {
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    echo "Uploaded image '$name'<br><img src='$name'>";
  }

  echo "</body></html>";
?>
	
				<form action="confirmation.html" method="post" class="message">
					<label>First Name</label>
					<input type="text" value="">
					<label>Subject:</label>
					<input type="text" value="">
					<label>Email Address</label>
					<input type="text" value="">
					<label>Message</label>
					<textarea></textarea>
                                        
                                        
                                        
					<input type="submit" value="Send Message">
                                                            </form>
                                                            
			</div>
		</div>
	</div>

			
	<div id="footer">
		<div class="clearfix">
			<div class="section">
				<h4>Latest News</h4>
				<p>
					Pet Book will be open to all May 16th 2015!
				</p>
			</div>
			<div class="section contact">
				<h4>Contact Us</h4>
				
				<p>
					<span>Phone:</span>  000 222 999
				</p>
				<p>
					<span>Email:</span> info@thepetbook.com
				</p>
			</div>
			<div class="section">
				<h4>SEND US A MESSAGE</h4>
				<p>
					If you have any questions please email us.
				</p>
				<a href="questions@thepetbook.com" class="subscribe">Click to send us an email</a>
			</div>
		</div>
		<div id="footnote">
			<div class="clearfix">
				<div class="connect">
					<a href="" class="facebook"></a><a href="" class="twitter"></a><a href="" class="googleplus"></a><a href="" class="pinterest"></a>
				</div>
				<p>
					© Copyright 2015 The Pet Book. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>