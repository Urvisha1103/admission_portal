<!DOCTYPE html>
<html>
<head>
    <title>Admission Portal</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container contact-page">
        <h1>Contact Us</h1>

        <p>We're here to help! Feel free to contact us with any questions or inquiries you may have.</p>

        <form action="process_contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number (Optional):</label>
                <input type="tel" id="phone" name="phone">
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>
    
<?php include 'footer.php'; ?>
</body>
</html>