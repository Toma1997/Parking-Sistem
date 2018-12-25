<?php

$jezici_mapa = array(
	'admin' => '<li class="nav-item"><a class="nav-link" href="?stranica=stats">Statistics</a>
				<li class="nav-item"><a class="nav-link" href="?stranica=messages">Messages</a>
				<li class="nav-item"><a class="nav-link" href="?stranica=addAdmin">Add Admin</a>',
	'client' => '<li class="nav-item"><a class="nav-link" href="?stranica=contact">Contact</a>	',
	'contact' =>  array('Contact Us',
				'You can send us an e-mail and fill out the following form:',
				'Name and surname:',
				'Email Address:',
				'Message title:',
				'Please enter a message:',
				'Enter Picture Code',
				'Send',
				'<address> <p> +381 11 3035 401, +381 11 3035 402 </ p>
				<p> <a href="mailto:parking@gmail.com "> parking@gmail.com </a> parkingsistem.rs </ p>
				<p> Belgrade, Serbia </ p> </ address> '),
	'copyright' => sprintf('&copy; Copyright: M&T %s | Terms of Service ', date('Y')),
	'info' =>  array('Floor:','Free space:','More detailed view'),
	'login' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=register">Register</a>
				<a class="text-light nav-link pt-0 pd-0" href="?stranica=login">Login</a>',
	'loginPage' =>  array('User login:', 'Email address:', 'Insert email address','Password:', 'Insert password', 'Log in', '<h5>The password is not valid! </h5>', '<h5> Invalid logging! </h5>'),			
	'logo' => 'Parking System',
	'logout' => '<a class="text-light nav-link pt-0 pd-0" href="?stranica=logout">Logout</a>',	
	'menu' => '<li class="nav-item"><a class="nav-link" href="?stranica=">Home</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=parking&nivo=0">Parking</a>
			   <li class="nav-item"><a class="nav-link" href="?stranica=price">Prices</a>',
	'parking' => array('ENTRANCE','EXIT','DOWN','UP','FROM DOWN','FROM UP'),
	'price' => array('<h1>Prices and Discounts</h1>',
				 '<div class="col bg-primary"><strong>Type of person</strong></div>
				<div class="col bg-primary"><strong>Service</strong></div>
				<div class="col bg-primary"><strong>Price for started hour</strong></div>',
				'Parking without reservation',
				'Parking with reservation'),
	'register' => array ('User registration', 'Face type:', 'Physical person', 'Legal person', 'Enter name', 'Enter surname',
				'Enter the email address', 'The phone number must have a template: 063-111-888 (8)', 'Enter phone number',
				'The password must have a minimum of: 8 characters of that one little letter, one large, special character and number.',
				'Enter password', 'Enter password again', 'Enter image from image', 'Register'),
	'reserve' => array('<h1>Parking reservation</h1>','Car registration number:','Floor:','Sector:','Place:','Date and time of parking reservation:','Reserve','Example','Check out'),	
	'stats'  => '<h1>STATISTICS</h1>',
	'text' => array('<h1>Garages and car parks</h1>
			   <p>Parking system operates one of the largest public garages. Users have about 400 parking spaces available.</p>
			   <h3>Parking in the garage</h3>
			   <p><li>Payable on start of the hour, daily (one-time daily parking)</li>
			   <li>Monthly subscriptions, depending on which type of service the user (natural or legal person) decides.</li></p>
			   <h3>Parking at the parking lots</h3>
			   <p>It is paid per hour, daily (one-time daily parking), but there are also several monthly subscription options.</p>',
  			   'Parking System Advantages',
				'Simple parking reservation',
				'Safety of your vehicle',
				'Real-time parking system',
				'Easy access to the parking place'),
	'type' =>  array('Physical','Legal'),
	'lang' => '<a class="float-left text-light nav-link pt-0 pd-0" id="srblat" href="?stranica={{URL}}&jezik=srpski_latinica">Srpski</a>
				<a class="float-left text-light nav-link pt-0 pd-0" id="srbcir" href="?stranica={{URL}}&jezik=srpski_cirilica">Српски</a>
				<a class="float-left text-light nav-link pt-0 pd-0" id="end" href="?stranica={{URL}}&jezik=english">English</a>',
);	
	
$jezici_error = array(
	'registration' => '<h5>Registration is invalid! </h5>',
	'floor' 	   => '<h5>No adequate floor was selected! </h5>',
	'sector'	   => '<h5>No adequate sector selected! </h5>',
	'place' 	   => '<h5>No adequate place selected! </h5>',
	'date' 		   => '<h5>Date and time are not in good format! </h5>',
	'reserved' 	   => '<h5>The place is not free, see the free space map! </h5>',
	'success' 	   => '<h5>Successfully booked place! </h5>',
	'error' 	   => '<h5>An error occurred while registering a vehicle, try again! </h5>',
	'pass'  	   => '<h5>Password is invalid! </h5>',
	'passCheck'    => '<h5>Unsuccessfully confirmed password!</h5>',
	'login'		   => '<h5>Invalid login! </h5>',
	'email'		   => '<h5>Email invalid! </h5>',
	'forename' 	   => '<h5>The forename is invalid! </ h5>',
	'surname' 	   => '<h5>The surname is invalid! </ h5>',
	'telephone'    => '<h5>The telephone is invalid! </ h5>',
	'captcha' 	   => '<h5>The entered code does not match with the image! </ h5>',
	'form' 		   => '<h3>Form validation error! </ h3>',
	'regCheck' 	   => '<h3>You are already registered! </ h3>',
	'link' 		   => '<div class="card-body"> <h4 class="card-title">Error 404! No such page.</h4></div>',
);

?>