<?php

  require_once("../models/db_connection.php");

    function validatePassword($password) 
    {
        // Checking if the password is at least 8 characters long
        if (strlen($password) < 8) 
        {
            return 0;
        } 
        else 
        {
            $hasNumber = false;
            $hasSymbol = false;

            // Loop through each character of the password and checking if it is a number or a symbol
            for ($i = 0; $i < strlen($password); $i++) 
            {
                $char = $password[$i];

                if ($char == '|') 
                {
                    return 0; // The password contains the '|' symbol, so return 0 immediately
                } 
                else if (is_numeric($char)) 
                {
                    $hasNumber = true;
                } 
                else if (!ctype_alpha($char) && !is_numeric($char)) 
                {
                    $hasSymbol = true;
                }
            }

            // Check if the password contains at least one number and one symbol
            if (!$hasNumber) 
            {
                return 0;
            } 
            else if (!$hasSymbol) 
            {
                return 0;
            } 
            else 
            {
                return 1;
            }
        }
    }

    function validateEmail($email) 
    {
      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) 
      {
        return 0;
      } 
      else 
      {
        return 1;
      }
    }

    function validateURL($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) 
        {
            return 0;
        } 
        else 
        {
            return 1;
        }
    }

    function findEmail($email) 
    {   
        $sql = "SELECT * FROM `user_all` WHERE user_email = '{$email}'";
        $result = sqlReadQuery($sql);

        if($result == 1)
        {
          return 1;
        }
        else
        {
          return 0;
        }
    }

    function findBusinessName($businessName) 
    {
        $sql = "SELECT * FROM `user_all` WHERE user_businessname = '{$businessName}'";
        $result = sqlReadQuery($sql);

        if($result == 1)
        {
          return 1;
        }
        else
        {
          return 0;
        }
    }

      function setOTP() 
      {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 6; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }
        
        return $code;
      }

      function setProductCode() 
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 8; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'GNGP-' . $code;
        return $code;
      }

      function setProductTypeCode() 
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 6; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'GNPT-' . $code;
        return $code;
      }

      function setProductIMGCode() 
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 8; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'GIMG-' . $code;
        return $code;
      }

      function setWishID() 
      {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 8; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'GNGW-' . $code;
        return $code;
      }


      function setCustomerID() 
      {
        $characters = '0123456789';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 13; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'EC-' . $code;
        return $code;
      }

      function setMerchantID() 
      {
        $characters = '0123456789';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 13; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'EM-' . $code;
        return $code;
      }

      function setAdminID() 
      {
        $characters = '0123456789';
        $code = '';
        
        // Loop 6 times to generate a 6-digit code
        for ($i = 0; $i < 13; $i++) 
        {
          // Generate a random index to select a character from the $characters string
          $index = rand(0, strlen($characters) - 1);
          // Append the selected character to the $code string
          $code .= $characters[$index];
        }

        $code = 'EA-' . $code;
        return $code;
      }
      
?>
