# tinyServiceManager
# DO NOT USE

## I WARNED YOU

## Notice
**This scripts requires the www-data user to execute sudo commands without password authentication!**

**This could represent a HUGE security problems in case some php files could allow REMOTE CODE EXECUTION**

**You've been advised**

## Description
This project is all about a tiny PHP page you can put on your webserver to check and manage some services.
Since the page is public you need to set-up a password (you can replace at the line 2):
![](https://i.imgur.com/ufX4Pf2.png)

You can edit the list of services and action in the 3rd line.
![](https://i.imgur.com/s2qoHhW.png)
In the above example you can read some services: hhvm, php5-fpm, nginx, sshd and proftpd.
Of those, you can only change the status of hhvvm and php5.
The resulting page should be like this one:
![](https://i.imgur.com/nJnrkYB.png)
The circle next to the name indicates the status of the service (red means the service is off, green means it's on)
![](https://i.imgur.com/qzPWZ4l.png)

## Allowing the script to execute sudo commands
To allow the script to execute sudo command you need to allor your webserver user (usually the `www-data` user) to execute sudo action.
You can accomplish that by typing this command (as sudo):
```
# visudo
``` 
And adding this line:
```
www-data ALL=NOPASSWD: ALL
```


# Requirements
This script requires the sudo command to be installed, and (obviously) a webserver capable of serving PHP files

# Thanks
This page is based on the Jens Motyka's login template (that you can find [here](https://codepen.io/clein/pen/xnmKL))

