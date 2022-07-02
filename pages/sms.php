<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sms</title>
    <script>

        //Send Get request via ajax
        var contacts = ["+233550148169", "+233268598973", "+233248697698", "+233591459831", "+233558078211", "+233201551170", "+233507728344", "+233572206897", "+233208407065", "+233241183958", "+233242850264", "+233242901147", "+233248371472", "+233248418122", "+233249150240", "+233249710876", "+233269693450", "+233271392361", "+233272310417", "+233273854831", "+233277981703", "+233279171562", "+233506007169", "+233506292874", "+233547474034", "+233547740356", "+233548608255", "+233549258206", "+233 55 039 0296", "+233551311613", "+233553538206", "+233554604280", "+233556832659", "+233557685113", "+233558382351", "+233558455414", "+233558747249", "+233561228486", "+233269307266", "+233550057247", "+233240354557", "+233572206897"];

            index = 0;

            function sendSMS() {
            //var key = Math.floor(100000 + Math.random() * 900000);
            var message = "Hello fellow old students. Voting ended yesterday. Here are your MOSA executives. President - Justice Duku, Vice President - Mavis Adjei, Secretary - Mavis Adjei, Financial Secretary - Rosemary Aryeetey, PRO - Tie, Organizer - Eric Agbavitor";
            console.log(message);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if(xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    console.log(index + " " + response);

                  //increase counter if key has entered database;
                  index = index + 1;
                            if(index < contacts.length) {
                            sendSMS();
                    }

                }
            }
            xhr.open("GET", "https://txtconnect.net/sms/api?action=send-sms&api_key=OlhhbnRob3NpczEyMw==&to="+contacts[index]+"&from=MOSA&sms=" + message + "&response=json&unicode=0", true);
            //xhr.open("GET", "https://txtconnect.net/sms/api?action=send-sms&api_key=OlhhbnRob3NpczEyMw==&to="+"+233269307266"+"&from=MOSA&sms=" + message + "&response=json&unicode=0", true);
            //xhr.open("GET", "fakerequest.php?key=1234");
            xhr.send();
        
    
    }
    </script>
</head>
<body>
    <button type="button" onclick="sendSMS()">send sms</button>
</body>
</html>