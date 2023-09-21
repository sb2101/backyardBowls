<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>BB</title>
    <style>
        .main_bg {
            background-color: #333;
            justify-content: center;
            align-items: center;
            margin: 0 auto;

        }

        .form {
            width: 650px;
        }

        .form-text {
            text-align: center;
            margin: 0 0 40px 0;
        }

        .form-text h1 span img {
            margin: 0 10px;

        }

        .form-text h1 {
            color: black;
            font-family: Arial;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .form-text p {
            color: black;
            font-family: Arial;
            font-size: large;
        }

        .main-form div {
            margin: 5px 5px;
            width: 300px;
            display:inline-block;
            padding: 0 0 1px 38px;

        }

        .main-form div input {
            width: 100%;
            font-family: Arial;
            background: none;
            border: 1px solid #ffca00;
            ;
            font-size: 20px;
            color: black;
            outline: none;
            padding: 3px 0 3px 10px;
            margin-top: 10px;
        }

        .main-form div select {
            width: 104%;
            font-family: Arial;
            background: none;
            border: 1px solid #ffca00;
            ;
            font-size: 20px;
            color: black;
            outline: none;
            padding: 3px 0 3px 10px;
            margin-top: 10px;
        }

        .main-form div span {
            width: 100%;
            font-family: Arial;
            color: black;
            font-size: 25px;
        }

        #submit {
            width: 89%;
            text-align: center;
        }

        #submit input {
            font-family: Arial;
            width: 200px;
            background-color: yellow !important;
            color: black !important;
            transition: all .3s;
        }

        #submit input:hover {
            font-family: Arial;
            width: 200px;
            background-color: black !important;
            color: #fff !important;
        }

        #submit input:active {
            font-size: 19px;
            background-color: rgb(46, 20, 5) !important;
            color: #fff !important;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relavtive;
        }

        /* Style navigation menu */
        nav ul {
            list-style-type: none;
            background-color: #444;
            text-align: center;
            padding: 20px;
            font-size:large;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        /* Style links on hover */
        nav ul li a:hover {
            color: #00bcd4;
        }

        nav ul li :hover {
            color: #00bcd4;
        }

        .table-container {
            background-color: whitesmoke;
            height: auto;
            width: 49%;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Add a box shadow for a box-like appearance */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body class="main_bg">
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Backyard Bowls</a></li>
                <li><a href="viewtable.php">Tables</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </nav>
    </header>
    <div>
        <div class="form table-container">
            <div class="form-text ">
                <!-- <a href="login.php">Admin</a> -->
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
                        <input type="number" name="people" id="people" placeholder="People" required>
                        <!-- <select name="people" id="people" required> 
                        <option value="">People</option>
                        <option value="1">1 People</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                    </select> -->
                        <!---this is the select option--->
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
    </div>
</body>

</html>