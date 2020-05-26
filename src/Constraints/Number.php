<?php 
namespace App\Validator\Constraints; 
use Symfony\Component\Validator\Constraint; 
/**  * @Annotation  */ 

class NoNumber extends Constraint {     
    public $message = 'au moins 1 chiffre requis';
         public function validatedBy()     
         {         
             return \get_class($this).'Validator';
         } 
} 

?>