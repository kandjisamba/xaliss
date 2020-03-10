<?php

namespace App\DataFixtures;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\Role\Role as RoleRole;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // $role=array();
        // Fixtures de roles
        $role = new Role();
        $role->setLibelle('Admin_System');
        $manager->persist($role);

        $role1 = new Role();
        $role1->setLibelle('Admin');
        $manager->persist($role1);

        $role2 = new Role();
        $role2->setLibelle('Caissier');
        $manager->persist($role2);

        $role3 = new Role();
        $role3->setLibelle('Partenaire');
        $manager->persist($role3);

        // $manager->flush();

        //Fixture de Users
        $admin = new User();
        $admin->setPrenom('Samba');
        $admin->setUsername('samba');
        $admin->setNom('KANDJI');
        $admin->setEmail('samba@gmail.com');
        $admin->setPassword($this->encoder->encodePassword($admin, 'samba123'));
        $admin->setIsActive(true);
        // $admin->setProfil($role);
        $admin->setProfil($role);
       // dd($admin->getRoles());

       // $admin->setProfil(1);
        $manager->persist($admin);
        $manager->flush();
    }
}