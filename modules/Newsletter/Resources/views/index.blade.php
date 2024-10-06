<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Subscription</title>
</head>
<body>
    <h1>Subscribe to Our Newsletter</h1>
    <form action="{{ url('newsletter/subscribe') }}" method="POST">
        @csrf
        <input type="email" name="email" required>
        <button type="submit">Subscribe</button>
    </form>
</body>
</html>