<?php

/*
 * Panther Demo
 *
 * In this example, we explore a more complicated interaction with a form.
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
?>
<form method="post" action="form.php">
    <fieldset>
        <legend>Example Form</legend>
        <div>
            <label>Your name
                <input name="name">
            </label>
        </div>
        <div>
            <label>Pick a number
                <select name="number">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </label>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </fieldset>
</form>