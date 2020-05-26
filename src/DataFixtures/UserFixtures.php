<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $role= ['ROLE_ADMIN'];
        $user = new User();
        $user->setEmail('admin@deloitte.com');
        $password = $this->encoder->encodePassword($user, 'admin123@');
        $user->setPassword($password);
        $user->setRoles($role);
        $user->setNom('admin');
        $user->setPrenom('admin');
        $user->setSection('Informatique');
        $user->setPhoto('user4.png');

        $manager->persist($user);
        $manager->flush();
    }
}
