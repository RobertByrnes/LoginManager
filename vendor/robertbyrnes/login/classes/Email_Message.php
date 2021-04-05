<?php

Trait Email_Message
{
    /**
     * Email template for registering a new user with the User class.
     *
     * @param string $authCode
     * @return string
     */
    public function confirmationEmailTemplate($authCode) : string
    {
        $message = ' 
        <!DOCTYPE html> 
        <head> 
            <title>Welcome to envirosample.online</title> 
        </head> 
        <body> 
            <h4>Thanks for joining us!</h4> 
            <table rules="all" cellspacing="0" style="border: 2px;  border-color: #FB4314; width: 100%;"> 
                <tr style="background: rgb(139, 139, 139);"> 
                    <td>
                        <strong>Email from: </strong>
                    </td>
                    <td>
                        admin@envirosample.online
                    </td> 
                </tr> 
                <tr> 
                    <td>
                        <strong>Website: </strong>
                    </td>
                    <td>
                        <a href="http://www.envirosample.online">www.envirosample.online</a>
                    </td> 
                </tr>
                <tr>
                    <td><strong>Click here to confirm your account: </strong></td>
                    <td>
                        <a href="login.manager.php?activity=activation.script&authCode='.$authCode.'"><strong>Confirm</strong></a>
                    </td>
                </tr>
            </table>
        </body> 
        </html>';
        return $message;
    }
}