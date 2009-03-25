<?php

$login = <<<LOGIN

<form style="margin: 0px auto; width: 300px;" method="POST" action="/Users/Login/">

    <table width="100%">

        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" /></td>
        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" /></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Login" /></td>
        </tr>

    </table>

</form>

LOGIN;

?>
