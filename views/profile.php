<?php

$profile = <<<PROFILE

<h1>Profile</h1>

<form method="post" action="/Users/Profile/Save/">

    <table style="width:100%;">

        <tr>
        
            <td class="key">Email:</td>
            <td>
                <input type="text" name="email" value="{$this->user->getEmail()}" />
            </td>

        </tr>

        <tr>
        
            <td class="key"></td>
            <td class="text">
                This is also your login token.
            </td>

        </tr>

        <tr>
        
            <td class="key">Old Password:</td>
            <td>
                <input type="text" name="old_password" value="" />
            </td>

        </tr>

        <tr>
        
            <td class="key">New Password:</td>
            <td>
                <input type="text" name="new_password" value="" />
            </td>

        </tr>

        <tr>
        
            <td class="key">Name:</td>
            <td>
                <input type="text" name="name" value="{$this->employee->getName()}" />
            </td>

        </tr>
        
        <tr>
        
            <td class="key">Address:</td>
            <td>
                <input type="text" name="address" value="{$this->employee->getAddress()}" />
            </td>

        </tr>
        
        <tr>
        
            <td class="key">Phone:</td>
            <td>
                <input type="text" name="phone" value="{$this->employee->getPhone()}" />
            </td>

        </tr>

        <tr>
        
            <td class="key"></td>
            <td>
                <input type="submit" name="submit" value="Save" />
            </td>

        </tr>
        
    </table>

</form>

PROFILE;

?>
