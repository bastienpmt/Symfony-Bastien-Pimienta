<?php 
    namespace App\Validator\Constraints; 
    use Symfony\Component\Validator\Constraint; 
    use Symfony\Component\Validator\ConstraintValidator; 
    use Symfony\Component\Validator\Exception\UnexpectedTypeException; 
    use Symfony\Component\Validator\Exception\UnexpectedValueException; 
    
/**  * @Annotation  */ 

    class MailValidator extends ConstraintValidator {     
        public function validate($value, Constraint $constraint)     
        {         
            $elements = explode("@", $value);
            $adress= $elements[1];

            if ($adress != 'deloitte.com') {             
                $this->context->buildViolation($constraint->message)                 
                ->setParameter('%string%', $value)                 
                ->addViolation();         
            }     
        } 
    } 