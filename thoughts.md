# General ideas
## Stuff
Different types of things people can make:
	- Text (Snippet)
	- Non-text (File)
	- URL (URL shortener)

## "Tracking"
It would be nice to track how many clicks each submission gets
	
## Being a user
- I am able to see list of submissions and how they are doing.
- I am able to "reactivate" a broken thing, if it isn't deleted.
- I am able to choose whether I'm browsable or not.

## Slugs
All slugs should be a hex ie:
	id      hex
	1       1
	15      f
	1231    4cf
	
And then i should check for slug availability, so that I can reference old/shorter slugs after X amount of time.
Things I need to think about:
	- How long should a slug be active?
	- How often should the CRON run? 
	- Fuck the what, I really like this idea
	- I need to have an "expired" period, so that people are able to tell (ie. forum) that the link is broken.

# ---- SPECIFICS ----
## Files
When securing files i need to check the following
	- User has the flashed session key to access the /files/{id} (GET) page
	- Check if the referrer is either one of these when file is accessed:
		1. /files/{id} (GET)
		2. /f/{id} (GET)
	- If that is true, get the ID (from the URL) and check if it is the right path for that file
		- Maybe?

### Ideas
When typing a password and a file is uploaded then change the text to either:
	- "I haz secure file"
	- A lock icon
	
## URLs
### Ideas
When creating a new URL the shortened version should be the HEX value of the ID. Would that work?

