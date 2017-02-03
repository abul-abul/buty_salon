<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Registration</title>
</head>
<body style="margin: 40px;">
    <h1 style="font-family: Tahoma, Geneva, sans-serif; font-size: 22px; text-transform: uppercase; font-weight: normal; color: #532994; margin: 0 0 20px 0;">Beauty Salon</h1>
    <p style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 20px; margin: 0 0 20px 0;">Registration Activeted</p>
    <p style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px; line-height: 20px; margin: 0 0 20px 0;"><a href="{{ action('UsersController@getActiveationProfile' , $token  )}}" target="_blank">click here</a></p>
</body>
</html>