<?php 
namespace App\Validator\Constraints; 
use Symfony\Component\Validator\Constraint; 
/**  * @Annotation  */ 

class Letter extends Constraint {     
    public $message = 'au moins 1 lettre requise';
         public function validatedBy()     
         {         
             return \get_class($this).'Validator';
         } 
} 

?>