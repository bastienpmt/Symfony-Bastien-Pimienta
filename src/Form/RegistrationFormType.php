<?php

namespace App\Form;

use App\Entity\User;
use App\Validator\Constraints\Letter;
use App\Validator\Constraints\Mail;
use App\Validator\Constraints\NoNumber;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Mail()
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Acceptez pour accéder au site',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => '{{ limit }} caractères minimum',
                        // max length allowed by Symfony for security reasons
                        'max' => 20,
                    ]),
                    new NoNumber(),
                    new Letter()
                ],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('section', ChoiceType::class, [
                'choices'  => [
                    'Recrutement' => 'Recrutement',
                    'Informatique' => 'Informatique',
                    'Comptabilité' => 'Comptabilité' ,
                    'Direction' => 'Direction',
                ],
            ])
            ->add('photo', FileType::class, array(
                'label'=>'Choisir une photo',
                'data_class' => null
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
