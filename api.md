# #darkshare API documentation

These examples will juse cURL.

## Snippets

### GET snippet

Get a snippet with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/s/a          # endpoint
``` 

### POST snippet 

Create a new snippet

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials (required)
	-F "body=`cat ~/path/to/file`" \ # snippet body (required)
	-F "title=bla" \        # snippet title (required)
	-F "mode=markdown" \    # snippet highlight type
	http://drk.sh/s     # endpoint
``` 

### DELETE snippet

Delete one of your own snippets with slug `a`

```bash
curl \
	-X DELETE \             # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/s/a
``` 

## Files

### GET file

Get a file with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/s/a # endpoint
``` 

### POST file

Create a new file

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials (required)
	-F "path=@/full/path/to/file" \ # full file path (required)
	http://drk.sh/f \   # endpoint
	> /path/to/destination/downloaded.md
``` 

### DELETE file

Delete one of your own files with slug `a`

```bash
curl \
	-X DELETE \             # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/f/a
``` 

## URL's

### GET URL

Get a url with the slug of `a`.

```bash
curl \
	-X GET \                # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/a            # endpoint
``` 

### POST URL

Create a new url

```bash
curl \
	-X POST \               # request method
	-u username:password \  # user credentials (required)
	-F "destination=http://duckduckgo.com" \ # url destination path (required)
	http://drk.sh/      # endpoint
``` 

### DELETE file

Delete one of your own URL's with slug `a`

```bash
curl \
	-X DELETE \             # request method
	-u username:password \  # user credentials (required)
	http://drk.sh/a
``` 
