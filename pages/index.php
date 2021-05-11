<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../style/login.css">
        <title>Serious Developers</title>
        <script src="https://kit.fontawesome.com/71307a101a.js" crossorigin="anonymous"></script>
    </head>

    <body class="login-container">
        <div class = "login-form">
            <div class="btn-box">
                <div class="button-holder" id="button-holder"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>

            <div class="social-icons">
                <img src="../images/facebook.png" alt="facebook-login" width="32" height="32">
                <img src="../images/google.png" alt="google-login" width="30" height="30">
            </div>

            <form action="../includes/login-inc.php" method="post" id="login" class = "login-input">
                <input type="text" name="email" class = "login-input-field" placeholder="email" required>
                <input type="password" name="pwd" class = "login-input-field" placeholder="password" required>
                <input type="checkbox" class="check-box"> <span>Remember password?</span>
                <button type="submit" class = "submit-btn" name="submit">Login</button>
            </form> 

            <form action="../includes/signup-inc.php" method="post" id="register" class = "login-input">
                <input type="text" name="name" class = "login-input-field" placeholder="Username" required>
                <input type="text" name="email" class = "login-input-field" placeholder="Email" required>
                <input type="password" name="pwd" class = "login-input-field" placeholder="Password" required>
                <input type="password" name="pwdr" class = "login-input-field" placeholder="Repeat password" required>

                <select name="county" id="main_menu" class="custom-select">
                    <option value="SM">Satu Mare</option>
                    <option value="MM">Maramures</option>
                    <option value="CJ">Cluj</option>
                </select>

                <select name="city" id="sub_menu" class="custom-select">

                </select>
                <br>
                <input type="radio" class="check-box" name="usertype" value="buyer" checked="checked">Buyer
                <input type="radio" class="check-box" name="usertype" value="vendor">Vendor               
                <br>
                <input type="checkbox" class="check-box" name="agree">I agree terms & conditions
                <button type="submit" class = "submit-btn" name="submit">Register</button>
            </form>
        
            <div class="error-msg">
                <?php
                
                if(isset($_GET['error'])){
                    if($_GET['error'] == "agree")
                        echo "<p>You must agree terms & conditions</p>";

                    if($_GET['error'] == "invalidinput")
                        echo "<p>Input is NOT valid</p>";

                    if($_GET['error'] == "userexists")
                        echo "<p>Email is already taken</p>";

                    if($_GET['error'] == "stmtfailed")
                        echo "<p>Something went wrong, please try again</p>";

                    if($_GET['error'] == "none")
                        echo "<p>Signed up SUCCEEDED</p>";
                    
                    if($_GET['error'] == "nouser")
                        echo "<p>User doesn't exist</p>";
                    
                    if($_GET['error'] == "loginfailed")
                        echo "<p>emal/password don't match</p>";
                }
                
                ?>
            </div>
        </div>    
        <script>
            var btn_login = document.getElementById("login")
            var btn_register = document.getElementById("register")
            var btn_switch = document.getElementById("button-holder")

            function register(){
                btn_login.style.left = "-400px";
                btn_register.style.left = "50px";
                btn_switch.style.left = "110px";
            }

            function login(){
                btn_login.style.left = "50px";
                btn_register.style.left = "450px";
                btn_switch.style.left = "0";
            }
        </script>
        
        <script>
            var county={
                    SM:['Satu Mare', 'Carei', 'Arad'],
                    MM:['Baia Mare', 'Baba', 'Baia Sprie'],
                    CJ:['Cluj Napoca', 'Baciu', 'Apahida']

            }
            var main= document.getElementById('main_menu')
            var sub = document.getElementById('sub_menu')

            main.addEventListener('change', function(){
                var selected_option = county[this.value]
                
                while(sub.options.length > 0){
                    sub.options.remove(0);
                }

                Array.from(selected_option).forEach(function(el){
                    let option = new Option(el, el);
                    sub.appendChild(option);
                })
            });
        </script>
    </body>
</html>