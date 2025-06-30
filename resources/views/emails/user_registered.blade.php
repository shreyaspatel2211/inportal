{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
</head>
<body>
    <h2>Welcome {{ $user->name }}!</h2>
    <p>Thank you for registering with us. Below are your registration details:</p>

    <table>
        <tr>
            <td><strong>Name:</strong></td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <td><strong>Password:</strong></td>
            <td>{{ $user->password }}</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <td><strong>Phone Number:</strong></td>
            <td>{{ $user->phone_number }}</td>
        </tr>
        <tr>
            <td><strong>State:</strong></td>
            <td>{{ $user->state }}</td>
        </tr>
        <tr>
            <td><strong>Country:</strong></td>
            <td>{{ $user->country }}</td>
        </tr>
        <tr>
            <td><strong>User Type:</strong></td>
            <td>{{ $user->user_type }}</td>
        </tr>
        <tr>
            <td><strong>Created At:</strong></td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
        </tr>
    </table>

    <p>If you have any questions, feel free to contact us!</p>

    <p>Best regards,</p>
    <p>The Platform Team</p>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
 
<head>
<meta charset="UTF-8">
<title>TRADESYNC Email</title>
</head>
 
<body style="margin:0; padding:0; background-color:#f4f4f4;">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f4f4; padding:20px 0;">
<tr>
<td align="center">
<table width="600" cellpadding="0" cellspacing="0" border="0"
style="background-color:#ffffff; font-family:Arial, sans-serif; border:1px solid #dddddd;">
 
<!-- Header -->
<tr>
<td align="" style="background-color:#065367; color:#ffffff; padding:10px;">
<img src="{{ asset('storage/logo.png') }}" alt="TRADESYNC Logo"
style="width:148px; height:auto; display:block; margin-bottom:0px;">
<!-- <h1 style="margin:0; font-size:24px;">TRADESYNCH</h1> -->
</td>
</tr>
 
<!-- Body -->
<tr>
<td style="padding:30px; color:#333333; line-height:1.5; font-size:16px;">
<h2 style="margin-top:0;">Hello {{ $user->name }},</h2>
 
<p> Thank you for registering with us. Below are your registration details: </p>
 
<p>Here's what's new:</p>
 
<ul style="padding-left: 20px;">
<li> Name : {{ $user->name }} </li>
<li> Password : trdsy2025 </li>
<li> Email : {{ $user->email }} </li>
<li> Phone Num : {{$user->phone_number}} </li>
<li> State : {{ $user->state }} </li>
<li> Country : {{ $user->country }} </li>
<li> User Type : {{ $user->user_type }} </li>
</ul>
<p>To learn more or take action, click the button below:</p>
<p>
<a href="https://trade.atdamss.com/"
style="display:inline-block; padding:10px 20px; background-color:#0056b3; color:#ffffff; text-decoration:none; border-radius:4px;">Learn
More</a>
</p>
<p>Thank you for being part of our community!</p>
<p>Best regards,<br>
<strong>TradeSynch</strong>
</p>
</td>
</tr>
 
<!-- Footer -->
<tr>
<td
style="background-color:#eeeeee; padding:20px; font-size:12px; color:#666666; text-align:center; font-family:Arial, sans-serif; line-height:1.5;">
&copy; 2025 TRADESYNC, All rights reserved.<br>
123 Business Street, City, Country<br>
<a href="https://trade.atdamss.com/" style="color:#0066cc; text-decoration:none;">Visit our
website</a>
</td>
</tr>
 
</table>
</td>
</tr>
</table>
</body>
 
</html>