<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>BB</title>
</head>

<body class="main_bg">
    <div class="form">
        <div class="form-text">
            <h1><span><img src="art-1.png" alt=""></span>Reservation Form<span><img src="art-1.png" alt=""></span></h1>
            <p>Book Your Table Now</p>
        </div>
        <div class="main-form">
            <form action="save.php" method="POST">
                <div>
                    <span>Your full name ?</span>
                    <input type="text" name="name" id="name" placeholder="Write your name here..." required>
                </div>
                <div>
                    <span>Your email address ?</span>
                    <input type="text" name="email" placeholder="Email" required>
                </div>
                <div>
                    <!-- <---this is the select option--->
                    <span>How many people ?</span>
                    <input type="text" name="people" id="people" placeholder="People" required>
                    <!--<select name="people" id="people" required>
                        <option value="">People</option>
                        <option value="1">1 People</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                    </select>-->
                    <!-- <---this is the select option--->
                </div>
                <div>
                    <span>What time ?</span>
                    <input type="time" name="time" id="time" placeholder="Time" required>
                </div>
                <div>
                    <span>What is the date ?</span>
                    <input type="date" name="date" id="date" placeholder="date" required>
                </div>
                <div>
                    <span>Your phone number ?</span>
                    <input type="text" name="phone" id="phone" placeholder="Phone" required>
                </div>
                <div id="submit">
                    <input type="submit" value="SUBMIT" id="submit">
                </div>


            </form>
        </div>
    </div>
</body>

</html>