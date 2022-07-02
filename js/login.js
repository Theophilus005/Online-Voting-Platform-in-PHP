function login() {
    var key = document.getElementsByClassName("voter-key-text")[0].value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status ==200) {
            var response = xhr.responseText;
            //alert(response);
            if(response == "found") {
                document.getElementsByClassName("status")[0].innerHTML = "";
                window.location = "pages/vote.php";
            }
            else {
            document.getElementsByClassName("status")[0].innerHTML = "Invalid key";
            }
        } 
    }

    xhr.open("GET", "pages/managekeys.php?key="+key);
    xhr.send();
}