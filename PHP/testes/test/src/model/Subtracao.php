<?php

namespace Elvis\Test\model;

class Subtracao
{
   /**
    * Undocumented variable
    * @var integer
    */
   private $num;

   /**
    * Undocumented variable
    *
    * @var integer
    */
   private $num2 = null;

   /**
    * Get the value of num
    */
   public function getNum()
   {
      return $this->num;
   }

   /**
    * Set the value of num
    *
    * @return  self
    */
   public function setNum($num)
   {
      $this->num = $num;

      return $this;
   }


   /**
    * Get the value of num2
    */
   public function getNum2()
   {
      return $this->num2;
   }

   /**
    * Set the value of num2
    */
   public function setNum2($num2)
   {
      if (is_null($num2)) {
        throw new \InvalidArgumentException('Parametro nao informado');
      }

      $this->num2 = $num2;
   }

   /**
    * Undocumented function
    */
   public function Subtrair()
   {
      return $this->num - $this->num2;

      // return 10;

   }
}
