<?php

    class CaptchaCode
    {
      private $seed;
      public $a = '', $b= '', $c= '', $rand = '', $img = '';

      public function getCode($choice)
      {
              if($choice == 'alphabets' or $choice == 'numbers' or $choice == 'alphanum')
              {
                      //ALPHABETS
                      if($choice == 'alphabets'){
                        $this->seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                      }
                      //NUMBERS
                      else if($choice == 'numbers'){
                        $this->seed = str_split('0123456789');
                      }
                      //ALPHABETS & NUMBERS
                      else{
                        $this->seed = str_split('abcdefghijklmnopqrstuvwxyz'.'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.'0123456789');
                      }
                      $this->x = shuffle($this->seed);
                      foreach (array_rand($this->seed, 5) as $this->k) $this->rand .= $this->seed[$this->k];
                      return $this->rand;
              }
              else
              {
                      $this->a = rand(1,10);
                      $this->b = rand(1,10);
                      $this->c = $this->a."a".$this->b;
                      $this->rand = $this->a + $this->b;
                      return $this->rand;
              }
        }
    }



    $captchaCode = new CaptchaCode();



?>
