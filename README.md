# AreaLoad

Autonomous Rubost External Area Upload System

# Features

* Limit the students' number range.
* Limit the file extension
* A simple question to prevent robot upload
* Upload-On-Lock, prevent duplicate upload or system attack
* Upload file size is limited to 200M

# How to deploy

Clone the repo first:
```
git clone https://github.com/n0vad3v/areaload.git
```

In Nginx Global config file, add the following line:
```
client_max_body_size 200m;
```

In Nginx server block specify some rules to protect SQLite Database and Upload file to prevent download by browser.
```
location /db{
    return 403;
}

location /web{
    return 403;
}

location /c{
    return 403;
}

location /sec{
    return 403;
}

location /network{
	return 403;
}
```

On /etc/php.ini change the following lines:
```
upload_max_filesize = 200M
```

Edit 'db/trustlist.asc' to the range of student numbers that are allowed to upload.

Edit 'index.php' to meet your need.

Good to go!

# TODO

- [ ] Add image captcha to prevent script auto submit
- [ ] On server file validation & malicious code scan

# Authors

[@n0vad3v](https://github.com/n0vad3v)
[@allenliu](https://github.com/allenliu123)
