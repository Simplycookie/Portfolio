<?php include("Base.php");

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DICE Club Registration</title>
        <link rel="stylesheet" href="global.css">
        <link href="https://fonts.googleapis.com/css2?family=Texturina:wght@700&family=Josefin+Sans:wght@400;600&display=swap" rel="stylesheet">
        <!-- Font Awesome 6 小眼睛 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <style>
            /* ----- 注册卡片：图片比例 ----- */
            
            .registration-container {
                max-width: 550px !important;
                margin: 40px auto;
                padding: 40px 35px;
                background: #E4E9EC;
                border-radius: 10px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            }
            
            .form-header h1 {
                font-family: 'Texturina', serif;
                font-size: 2.2rem;
                color: #1C1C1C;
                margin-bottom: 10px;
                border-bottom: 3px solid #272727;
                padding-bottom: 15px;
            }
            
            .form-description {
                color: #272727;
                font-size: 1rem;
                margin-bottom: 30px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            /* 密码小眼睛 */
            
            .password-wrapper {
                position: relative;
                display: flex;
                align-items: center;
            }
            
            .password-wrapper input {
                width: 100%;
                padding-right: 45px;
            }
            
            .password-toggle {
                position: absolute;
                right: 12px;
                top: 50%;
                transform: translateY(-50%);
                background: transparent;
                border: none;
                cursor: pointer;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #272727;
                font-size: 1.2rem;
                transition: color 0.2s;
            }
            
            .password-toggle:hover {
                color: #000;
            }
            
            .password-toggle i {
                pointer-events: none;
            }
            
            .password-hint {
                color: #666;
                font-size: 0.8rem;
                margin-top: 5px;
                font-style: italic;
            }
            /* ----- 单选按钮组（年龄二选一）----- */
            
            .radio-group {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 14px;
            }
            
            .radio-group input[type="radio"] {
                width: 18px;
                height: 18px;
                margin: 0;
                accent-color: #272727;
                flex-shrink: 0;
                cursor: pointer;
            }
            
            .radio-group label {
                color: #1C1C1C;
                font-size: 0.95rem;
                line-height: 1.5;
                word-break: break-word;
                flex: 1;
                cursor: pointer;
            }
            /* ----- 复选框（Discord）----- */
            
            .checkbox-group {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 14px;
            }
            
            .checkbox-group input[type="checkbox"] {
                width: 18px;
                height: 18px;
                margin: 0;
                accent-color: #272727;
                flex-shrink: 0;
                cursor: pointer;
            }
            
            .checkbox-group label {
                color: #1C1C1C;
                font-size: 0.95rem;
                line-height: 1.5;
                word-break: break-word;
                flex: 1;
                cursor: pointer;
            }
            
            .btn-submit {
                width: 100%;
                padding: 16px;
                background: linear-gradient(145deg, #272727, #1C1C1C);
                color: #FAFDFF;
                border: none;
                border-radius: 12px;
                font-family: 'Texturina', serif;
                font-size: 1.3rem;
                cursor: pointer;
                transition: 0.3s;
                margin-top: 10px;
            }
            
            .btn-submit:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            }
            
            .login-link {
                text-align: center;
                margin-top: 20px;
                color: #1C1C1C;
            }
            
            .login-link a {
                color: #272727;
                font-weight: 600;
                text-decoration: underline;
            }
            
            .success-message {
                background: rgba(39, 39, 39, 0.95);
                border-radius: 15px;
                padding: 30px;
                text-align: center;
                color: #FAFDFF;
                margin-top: 30px;
            }
            
            .btn-success {
                display: inline-block;
                margin-top: 20px;
                padding: 12px 30px;
                background: #B4B6B9;
                color: #272727;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
            }
            
            .error-message {
                color: #ff6b6b;
                font-size: 0.8rem;
                margin-top: 5px;
            }
            
            @media (max-width: 600px) {
                .registration-container {
                    max-width: 100% !important;
                    margin: 20px;
                    padding: 30px 20px;
                }
                .form-header h1 {
                    font-size: 1.8rem;
                }
                .radio-group,
                .checkbox-group {
                    gap: 8px;
                    margin-bottom: 16px;
                }
            }
        </style>
    </head>

    <body>

        <main class="registration-container">
            <form id="registrationForm" method="POST" action="paymentform.php" target="_blank"></form>
                <div class="form-header">
                    <h1>DICE Event Booking</h1>
                    <p class="form-description">Here you can make your bookings with any of our avalible events</p>
                </div>
                <hr>
                <div class="form-header">
                    <h1>Personnal Information</h1>
                    <p class="form-description" id="User_info"></p>
                </div>
                <div id="jsinputs">
                </div>
                <hr>
                <div class="form-header">
                    <h1>Event Booking</h1>
                    <p class="form-description"></p>
                </div>

                <!-- 姓名 -->
                <div class="form-group">
                    <label for="Cat_ID">Event Catagory*</label>
                    <select name="Cat_ID" id="Cat_ID">
                        <?php
                            $cat = mysqli_query($connect, "select * from categories");	
                            while($erow = mysqli_fetch_assoc($cat))
                                {
                                ?>
                                    <option value="<?php echo $erow["ECat_ID"] ?>"><?php echo $erow["ECat_Name"];?></option>
                                <?php 
                                }
                                ?> 
                    </select>
                    <div class="error-message" id="CatError"></div>
                </div>

                <div class="form-group">
                    <label for="Event_ID">Event *</label>
                    <select name="Event_ID" id="Event_ID">
                    </select>
                    <div class="error-message" id="EventError"></div>
                </div>

                <!-- 邮箱 -->
                <div class="form-group">
                    <label for="Pax">Pax *</label>
                    <input type="number" id="Pax" name="Pax" placeholder="1" required min="1">
                    <div class="error-message" id="PaxError"></div>
                </div>

                <div class="form-header">
                    <h1>Booking Details</h1>
                    <p class="form-description" id="details"></p>
                </div>
                <div id="secinput">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit" name="submit-btn" id="submit-btn" onclick="handleSubmit()">Proceed to payment</button>
                    </div>
            </form>
                <div id="response"></div>

        </main>

        <hr>

        <footer class="footer2">
            <p>&copy; 2026 D.I.C.E. MMU | Dive into Imagination for Creative Entertainment</p>
            <div class="social-links">
                <a href="#">Instagram</a> |
                <a href="#">Discord</a> |
                <a href="#">Email</a>
            </div>
        </footer>

    </body>
    <script>
        function display_events(){
            let categoryindoc = document.getElementById("Cat_ID").value;
            const event_div = document.getElementById("Event_ID");
            let categories = [[],[],[]];
            <?php 
            $cat = mysqli_query($connect,"SELECT * FROM dice_event WHERE isPassed=0");
            while($Crow = mysqli_fetch_assoc($cat)){
                $E_ID = $Crow["Event_ID"];
                $E_Name = $Crow["Event_Name"];
                $E_Cat = $Crow["Event_Category"];
                echo "\n\t\t\tcategories[0].push('$E_ID');";
                echo "\n\t\t\tcategories[1].push('$E_Name');";
                echo "\n\t\t\tcategories[2].push('$E_Cat');";
            }
            ?>
            let index = 0;
            let placeholderhtml = ""
            while (index < categories[0].length) {
                if(categories[2][index] == categoryindoc){
                    placeholderhtml += "<option value='" + categories[0][index] + "'>" + categories[1][index] + "</option>\n";
                }
                index++;
            }
            document.getElementById("Event_ID").innerHTML = placeholderhtml;
        }
        display_events();
        document.getElementById("Cat_ID").addEventListener("change", function() {
            display_events();
            display_details();
        });
        document.getElementById("Pax").addEventListener("input", function() {
            display_details();
        });
        document.getElementById("Event_ID").addEventListener("change", function() {
            display_details();
        });
        function display_personnal(){
            const currentUser = JSON.parse(localStorage.getItem('currentUser') || 'null');
            const userhtml = document.getElementById("User_info");
            const inputshtml = document.getElementById("jsinputs");
            let userplaceholderhtml = "";
            let inputs = "";
            let fullname = currentUser.fullName;
            let userEmail = currentUser.email;
            let phone = currentUser.phone;
            let date = new Date().toISOString();
            
            inputs += "<input type='hidden' value='" + currentUser.id +"' name='ID' id='ID'></input>\n";
            inputs += "<input type='hidden' value='" + date +"' name='date'></input>\n";
            userplaceholderhtml +="<br><b>Full Name: </b>" + fullname + "\n<br><b>Email Address: </b>"+ userEmail +"\n<br><b>Phone Number: <b>" + phone;
            userhtml.innerHTML = userplaceholderhtml;
            document.getElementById("jsinputs").innerHTML = inputs;
            
            

        }
        function display_details(){
            const displayhtml = document.getElementById("details");
            const inputhtml = document.getElementById("secinput");
            const event_id = document.getElementById("Event_ID").value;
            const pax = document.getElementById("Pax").value;
            let date = [];
            let time = [];
            let cost = [];
            let id = [];
            <?php 
            $event = mysqli_query($connect,"SELECT * FROM dice_event WHERE isPassed=0");
            while($row = mysqli_fetch_assoc($event)){
                $date = $row["Event_Date"];
                $time = $row["Event_Time"];
                $cost = $row["Event_Price"];
                $id = $row["Event_ID"];
                echo "date.push('$date');\n";
                echo "time.push('$time');\n";
                echo "cost.push('$cost');\n";
                echo "id.push('$id');\n";
            }
            ?>

            let index = 0;
            let placeholderhtml = ""
            while (index < id.length) {
                if(id[index] == event_id){
                    let total = parseFloat(cost[index]) * parseInt(pax);

                    let inputs = "";
                    inputs += "<input type='hidden' value='" + total +"' name='cost' id='cost'></input>\n";
                    let placeholderhtml = "";
                    placeholderhtml = "Date: "+date[index]+"<br>\nTime: "+time[index]+"<br>Pax: "+pax+"<br>\nvenue: FAIE 3044 MMU cyberjaya<br>\n"+"Cost: "+total;

                    displayhtml.innerHTML = placeholderhtml;
                    inputhtml.innerHTML = inputs;
                }
                index++;
            }

            
        }
        display_personnal();
        function openPostInNewTab(url, data) {
                    // Create a form element
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;
                    form.target = '_self'; // Open in new tab

                    // Add hidden inputs for each data field
                    for (const key in data) {
                        if (Object.prototype.hasOwnProperty.call(data, key)) {
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = key;
                            input.value = data[key];
                            form.appendChild(input);
                        }
                    }
                    // Append form to body, submit, then remove
                    document.body.appendChild(form);
                    form.submit();
                    document.body.removeChild(form);
                }

        function init() {
                const form = document.getElementById('registrationForm');
                const butn = document.getElementById('submit-btn');
                form.addEventListener('submit', handleSubmit);
                butn.addEventListener('submit', handleSubmit)
            }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', init);
        } else {
            init();
        }

        function clearErrors() {
            document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
        }

        function showError(fieldId, message) {
            const el = document.getElementById(fieldId);
            if (el) el.innerHTML = message;
        }

        function handleSubmit() {
                const id = document.getElementById('ID').value;
                const Event_ID = document.getElementById('Event_ID').value;
                const Pax = document.getElementById('Pax').value;
                const cost = document.getElementById('cost').value;

                clearErrors();

                let isValid = true;

                if (!id) {
                    isValid = false;
                }
                if (!Event_ID) {
                    showError('EventError', 'event is required');
                    isValid = false;
                }
                if (!Pax) {
                    showError('PaxError', 'Pax greater then 1 is required');
                    isValid = false;
                }   
                
                if (!isValid) return;

                openPostInNewTab('paymentform.php',{
                    ID : id,
                    Event_ID : Event_ID,
                    Pax : Pax,
                    date : new Date().toISOString(),
                    cost : cost,
                    ranid : new Date().toISOString() + id
                });
            }

    </script>
</html>