# #darkshare API documentation

These examples will juse cURL.

## Snippets

### GET snippet

Get a snippet with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (get your snippets without password)
	-d "password=[password]" \ # unlock with a password
	http://drk.sh/s/a       # endpoint
``` 

### POST snippet 

Create a new snippet

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials
	-d "body=@/path/to/file.txt" \ # snippet body (required)
	-d "title=bla" \        # snippet title (required)
	-d "mode=markdown" \    # snippet highlight type
	-d "password=[password]" \ # protect with a password
	http://drk.sh/s     # endpoint
``` 

### DELETE snippet

You cannot delete snippets through API, yet. Sorry.

## Files

### GET file

Get a file with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (get your snippets without password)
	-d "password=[password]" \ # unlock with a password
	http://drk.sh/s/a       # endpoint
``` 

### POST file

Create a new file

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials
	-d "password=[password]" \ # protect with a password
	-F "path=@/full/path/to/file" \ # full file path (required)
	http://drk.sh/f \       # endpoint
	> /path/to/destination/downloaded.md
``` 

### DELETE file

You cannot delete files through API, yet. Sorry.

## URL's

### GET URL

Get a url with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (get your snippets without password)
	-d "password=[password]" \ # unlock with a password
	http://drk.sh/a         # endpoint
``` 

### POST URL

Create a new url

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials (save within your user)
	-d "destination=http://duckduckgo.com" \ # url destination path (required)
	-d "password=[password]" \ # protect with a password
	http://drk.sh/          # endpoint
``` 

### DELETE file

You cannot delete URL's through API, yet. Sorry.

