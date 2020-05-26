<?php 
namespace App\Validator\Constraints; 
use Symfony\Component\Validator\Constraint; 
/**  * @Annotation  */ 

class Mail extends Constraint {     
    public $message ='l\'adresse mail doit se finir par @deloitte.com';
         public function validatedBy()     
         {         
             return \get_class($this).'Validator';
         } 
} 

?>