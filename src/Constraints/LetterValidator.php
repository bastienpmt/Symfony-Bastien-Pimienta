<?php 
    namespace App\Validator\Constraints; 
    use Symfony\Component\Validator\Constraint; 
    use Symfony\Component\Validator\ConstraintValidator; 
    use Symfony\Component\Validator\Exception\UnexpectedTypeException; 
    use Symfony\Component\Validator\Exception\UnexpectedValueException; 
    
/**  * @Annotation  */ 

    class LetterValidator extends ConstraintValidator {     
        public function validate($value, Constraint $constraint)     
        {         
            if (preg_match('/^[0-9]+$/', $value, $matches)) {             
                $this->context->buildViolation($constraint->message)                 
                ->setParameter('%string%', $value)                 
                ->addViolation();         
            }     
        } 
    } 