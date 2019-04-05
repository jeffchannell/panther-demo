<?php

/*
 * Panther Demo
 *
 * Jeff Channell 2019
 */

// handle POST requests to this script
if (!empty($_POST)) {
    // always echo out the thank you message with the name
    echo 'Thanks for your submission, '.htmlspecialchars($_POST['name'] ?: '').'. ';
    // echo a different ending based on the value of number
    switch (intval($_POST['number'] ?: 1)) {
        case 1:
            echo 'Fnord!';
            break;
        case 2:
            echo 'Excellent choice!';
            break;
        case 3:
            echo 'Interesting selection...';
            break;
    }
    // end processing of the script
    die;
}

// show an HTML page on GET requests
?><!DOCTYPE html>
<html>
    <head>
        <title>JS Example</title>
    </head>
    <body>
        <script>/*<![CDATA[*/
        var button = document.createElement("button");
        button.appendChild(document.createTextNode("Send Request"));
        document.body.insertBefore(button, document.body.childNodes[0]);
        button.addEventListener('click', function() {
            sendPostData("name=Naboo&number=5");
        });

        var container = document.createElement("div");
        container.appendChild(document.createTextNode("Before AJAX"));
        document.body.insertBefore(container, document.body.childNodes[0]);

        function sendPostData (params) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/js.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (4 == xhr.readyState && 200 == xhr.status) {
                    container.innerText = xhr.responseText;
                    container.className = 'done';
                }
            }
            xhr.send(params);
        };
        /*]]>*/</script>
    </body>
</html>