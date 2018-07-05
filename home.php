<!--STEP 1: Include the following codes on top.-->
<?php

include 'captchaCode.php';

/*Captcha containing alphabets and numbers*/
//$code = $captchaCode->getCode('alphabets'); /*Captcha containing only alphabets*/
//$code = $captchaCode->getCode('numbers'); /*Captcha containing only numbers*/
//$code = $captchaCode->getCode('alphanum'); /*Captcha containing alphabets and numbers*/
//$code = $captchaCode->getCode(''); /*Math Captcha*/
$code = $captchaCode->getCode('');
$numc = $captchaCode->c;
?>


<!--STEP 2: Include this link where you want to display the captcha-->
<img src='captchaImage.php?numc=<?php echo $numc ?>&code=<?php echo $code ?>' >


<!--After submiting captcaha value by the user verify it by '$code'. $code contains the correct value of captcha-->
<?php
echo $code;
?>
