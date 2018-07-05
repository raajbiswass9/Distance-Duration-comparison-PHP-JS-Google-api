<?php

require_once 'captchaCode.php';

class CaptchaImage
{
    public $sum, $image, $black, $white, $random, $alt, $x;
    public $dir = 'fonts/';
    function __construct() {

    }

    public function image($numc, $code){
      if($numc != ''){
        $this->x = explode("a",$numc);
        $this->sum = $this->x[0]." + ".$this->x[1];
      }
      else{
        $this->sum = $code;
      }

      $this->image = imagecreatetruecolor(120, 50);
      $this->black = imagecolorallocate($this->image, 0, 0, 0);
      $this->white = imagecolorallocate($this->image, 255, 255, 255);
      $this->random = imagecolorallocate($this->image, rand(1, 254), rand(1, 254), rand(1, 254));
      imagefilledrectangle($this->image,0,0,200,100,$this->black);
      for($i = 0; $i<200; $i++){
        imagefilledellipse($this->image, mt_rand(0,120), mt_rand(0,50), 1, 1, $this->random);
      }
      for($i = 0; $i<10; $i++){
        imageline($this->image, rand(1, 300), rand(1,200), rand(1,110), rand(1,90), $this->random);
        imageline($this->image, rand(1, 90), rand(1,110), rand(1,200), rand(1,300), $this->random);
      }
      imagettftext($this->image, 20, 5, 10, 40, $this->white, $this->dir."arial.ttf", $this->sum);
      header("Content-type: image/png");
      imagepng($this->image);
      imagedestroy($this->image);
    }
}

if (isset($_GET['code']))
{
  $code = $_GET['code'];
  $numc = $_GET['numc'];
  $captchaCode = new CaptchaImage();
  $captchaCode->image($numc, $code);
}



 ?>
