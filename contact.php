<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      session_start(); // Start the session at the beginning
      include "inc/head.inc.php";
    ?>
    <title>Contact Us</title>
    <style>

         body {
            background-image: url('images/background_6.png');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0; /* Ensure there's no default margin */
         }
        /* Styles for the map and form containers */
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin: 20px;
        }

        .map-container {
            width: 100%; /* Full width for map container */
            height: 600px; /* Adjust the height as needed */
            margin-bottom: 20px; /* Add margin between map and form */
        }

        .form-container {
            width: 100%; /* Full width for form container */
            padding: 20px;
            box-sizing: border-box;
            border-radius: 5px;
        }
        /* Styles for the form elements */
        .form-group {
            margin-bottom: 20px; /* Increased margin bottom for form groups */
        }

        label {
            display: block;
            font-size: 36px;
            margin-bottom: 10px; /* Increased margin bottom for labels */
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 10px; /* Increased padding for input, textarea, and select */
            border-radius: 5px; /* Increased border-radius for input, textarea, and select */
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            height: 400px; /* Increased height for textarea */
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 25px; /* Increased padding for button */
            border-radius: 5px;
            cursor: pointer;
            font-size: 32px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
   <?php
      include "inc/header.inc.php";
    ?>
    <main>
    <div class="container">
        <div class="map-container">
            <!-- Replace the iframe URL with your Google Maps iframe -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6708.111371444832!2d103.84431449069872!3d1.3765474444663477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da16e96db0a1ab%3A0x3d0be54fbbd6e1cd!2sSingapore%20Institute%20of%20Technology%20(SIT%40NYP)!5e0!3m2!1sen!2ssg!4v1710988482062!5m2!1sen!2ssg" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" aria-label="Gmaps"></iframe>
        </div>
        <div class="form-container">
            <form id="reviewForm" action="contact.php" method="POST">
                <div class="form-group">
                  <label for="name">Leave a Review!</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name (optional)">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="Enter your email (required)" required>
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" placeholder="Message(optional)"></textarea>
                </div>
                <div class="form-group">
                    <label for="rating">Rate Us!</label>
                    <select id="rating" name="rating">
                        <option value="" selected disabled>Select a rating</option>
                        <option value="1">1 (Bad)</option>
                        <option value="2">2 (Fair)</option>
                        <option value="3">3 (Average)</option>
                        <option value="4">4 (Good)</option>
                        <option value="5">5 (Amazing)</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    </main>
    <?php
      include "inc/footer.inc.php";
    ?>
   <div class="loader">
        <img src="images/loader.gif" alt="loading">
    </div>
    <div id="dialog" style="display: none;">
        <p>Thank you for your review!</p>
    </div>

    <script src="js/script.js"></script>
    <script>
        // JavaScript to show dialog box after form submission
        document.getElementById('reviewForm').addEventListener('submit', function() {
            // Show the dialog box
            document.getElementById('dialog').style.display = 'block';
            alert('Thank you for your review!')
        });
    </script>

</body>

</html>
