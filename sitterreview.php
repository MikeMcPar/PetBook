<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Accounts - Pet Book</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<div class="clearfix">
			<div class="logo">
				<a href="homepage.php"><img src="images/logo.jpg" alt="LOGO" height="202" width="209"></a>
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
					<h2>What do you want to do?</h2>
        
					<ul>
						<li>
							<a href="addpet.php">Add Pet</a>
						</li>
						<li>
							<a href="removepet.html">Remove Pet</a>
						</li>
						<li>
							<a href="viewpets.html">View Pets</a>
						</li>
                                                    <li>
							<a href="reviewpage.html">Write A Review!</a>
						</li>
                                                <li>
							<a href="logout.php">Logout!</a>
						</li>
						
					</ul>
				</div>
				 
			</div>
				
			<div class="main">
                        <a href="homepage.php">Back Home!</a>
				<h1>Review A Pet Sitter Account</h1>
				
				<p>
                                     Here, you can write a small review about your experiences with this pet sitter.
                                </p>
				<p>
					Please fill out a bit of what you think about this sitter.
                                                    
                        </p>
                        
                        <?php include 'reviewpetsitter.php'; ?>
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