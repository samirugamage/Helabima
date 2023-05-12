* index.php is the homepage
* To log in as admin username is "admin" and password is "admin"

# Structure of the site
index.php 	
	-> Lands
		-> view lands

	-> About us

	-> Choose account
		-> buyer login 
			-> buyer signup
			-> buyer dashboard
				-> Edit Profile

		-> seller login
			-> seller signup
			-> seller dashboard
				-> post a new ad
				-> edit advertisement
				-> edit Profile	

		-> if you logged in as admin (username is "admin", password is "admin")
			-> admin dashboard
				-> manage advertisements 
				-> manage buyers				-> manage sellers
				-> manage payments

* For every account created by students password is "1234" (for ease of inspection)

# Privilages according to the account type

Buyers can
	- view contact details of the seller
	- add advertisements to the wishlist
	- manage wishlist
	- edit profile
	- delete account

Sellers can 
	- post a ads
	- edit ads (only ads that were published by them)
	- delete ads (only ads that were published by them)
	- edit profile
	- delete account

admin can
	- manage all users
	- manage all ads
	- payment details