# Files
When securing files i need to check the following
	- User has the flashed session key to access the /files/{id} (GET) page
	- Check if the referrer is either one of these when file is accessed:
		1. /files/{id} (GET)
		2. /f/{id} (GET)
	- If that is true, get the ID (from the URL) and check if it is the right path for that file
		- Maybe?
	
## Ideas
When typing a password and a file is uploaded then change the text to either:
	- "I haz secure file"
	- A lock icon
