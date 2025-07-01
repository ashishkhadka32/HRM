<!DOCTYPE html>
<html>

<head>
    <title>Welcome to Our Company</title>
</head>

<body>
    <h1>Welcome to Our Company!</h1>
    <p>Dear Employee,</p>
    <p>Your account has been created successfully. Below are your login credentials:</p>
    <ul>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Password:</strong> {{ $password }}</li>
        <li><strong>Role:</strong> {{ $role }}</li>
    </ul>
    <p>Please change your password after logging in for security purposes.</p>
    <p>Best regards,<br>Your Company Name</p>
</body>

</html>
