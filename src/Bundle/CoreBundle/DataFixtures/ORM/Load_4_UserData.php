<?php

declare(strict_types=1);

namespace Bundle\CoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bundle\UserBundle\Entity\User;

class Load_4_UserData extends AbstractFixture implements OrderedFixtureInterface
{

    protected $applicationUrl;

    public function __construct($applicationUrl)
    {
        $this->applicationUrl = $applicationUrl;
    }

    public function load(ObjectManager $manager)
    {

        $profileSuperAdmin = $this->getReference('profile-super-admin');
        $profilePdvAdmin = $this->getReference('profile-pdv-admin');
        $profileEmployee = $this->getReference('profile-employee');
        $profileClient = $this->getReference('profile-client');
        $profileGuest = $this->getReference('profile-guest');
	
	    $pointOfSale_3 = $this->getReference('pointofsale-3');
	    $pointOfSale_4 = $this->getReference('pointofsale-4');
		

        $entity = new User();
        $entity->setDni('12345688');
        $entity->setRuc('12345688457');
        $entity->setPassword('123');
        $entity->setName('Enmanuel');
        $entity->setLastName('Enmanuel');
        $entity->setUsername('enmanuel');
        $entity->setEmail('enmanuel@' . $this->applicationUrl);
        $entity->setProfile($profileSuperAdmin);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        $this->addReference('user-1', $entity);

        
        $entity = new User();
        $entity->setDni('87654321');
	    $entity->setRuc('87654321111');
        $entity->setPassword('123');
        $entity->setName('Wuales');
        $entity->setLastName('Kharivero');
	    $entity->setUsername('wualeskharivero');
        $entity->setEmail('wualeskharivero@' . $this->applicationUrl);
        $entity->setProfile($profilePdvAdmin);
	    $entity->setPointOfSaleActive($pointOfSale_4);
        $manager->persist($entity);
        
	    $pointOfSale_4->addUser($entity);
	    $manager->persist($pointOfSale_4);
        
        $this->addReference('user-2', $entity);
	
        
	
	    /**
	     * EMPLOYEE
	     */
        $entity = new User();
        $entity->setDni('22334455');
	    $entity->setRuc('22334455334');
        $entity->setPassword('123');
        $entity->setName('Fabiana');
        $entity->setLastName('Salazar');
	    $entity->setUsername('fabianasalazar');
        $entity->setEmail('fabianasalazar@' . $this->applicationUrl);
        $entity->setProfile($profileEmployee);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        
        $this->addReference('user-3', $entity);

        
        
        $entity = new User();
        $entity->setDni('99887766');
	    $entity->setRuc('99887766556');
        $entity->setPassword('123');
        $entity->setName('Maria');
        $entity->setLastName('Rodriguez');
        $entity->setEmail('mariarodriguez@' . $this->applicationUrl);
        $entity->setProfile($profileEmployee);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
	
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        
        $this->addReference('user-4', $entity);

        
        
        $entity = new User();
        $entity->setDni('67572335');
	    $entity->setRuc('67572335556');
        $entity->setPassword('123');
        $entity->setName('Nombre');
        $entity->setLastName('Apellido');
        $entity->setEmail('nombreapellido@' . $this->applicationUrl);
        $entity->setProfile($profileEmployee);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
	
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        
        $this->addReference('user-41', $entity);

        
        
        
        
	
	    /**
	     * CLIENT
	     */
        $entity = new User();
        $entity->setCode('C20537704528');
        $entity->setDni('');
	    $entity->setRuc('20537704528');
	    $entity->setPhone('999274437');
	    $entity->setCreditLine(7000.34);
	    $entity->setBalance(5000.34);
        $entity->setPassword('123');
        $entity->setName('4EVER UNIFORMS S.A.C');
        $entity->setLastName('');
        $entity->setEmail('scasahelena2003@yahoo.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
        $manager->persist($pointOfSale_3);
        $this->addReference('user-5', $entity);

        $entity = new User();
	    $entity->setCode('C20537646579');
        $entity->setDni('');
	    $entity->setRuc('20537646579');
	    $entity->setPhone('999274437');
	    $entity->setCreditLine(8000.34);
	    $entity->setBalance(4000.34);
        $entity->setPassword('123');
        $entity->setName('PIMA INVESTMENT SAC');
        $entity->setLastName('');
        $entity->setEmail('pimasac@' . $this->applicationUrl);
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);

        $entity = new User();
	    $entity->setCode('C20537570815');
        $entity->setDni('');
	    $entity->setRuc('20537570815');
	    $entity->setPhone('2831073');
	    $entity->setCreditLine(9000.34);
	    $entity->setBalance(5000.34);
        $entity->setPassword('123');
        $entity->setName('DUNAMIS VIP S.R.L.');
        $entity->setLastName('');
        $entity->setEmail('jgastelu@koketa.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-6', $entity);

        $entity = new User();
	    $entity->setCode('CL43008646');
        $entity->setDni('');
	    $entity->setRuc('43008646');
	    $entity->setPhone('991719123');
	    $entity->setCreditLine(3400.34);
	    $entity->setBalance(2000.34);
        $entity->setPassword('123');
        $entity->setName('ALTAMIRANO ORTIZ ANTONY JESUS');
        $entity->setLastName('');
        $entity->setEmail('antonyaltamirano_@hotmail.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-7', $entity);
        
        $entity = new User();
	    $entity->setCode('CL42976683');
        $entity->setDni('');
	    $entity->setRuc('42976683');
	    $entity->setPhone('991719123');
	    $entity->setCreditLine(7880.34);
	    $entity->setBalance(5500.34);
        $entity->setPassword('123');
        $entity->setName('GARCIA BERRU FANY');
        $entity->setLastName('');
        $entity->setEmail('garciaberru@hotmail.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-8', $entity);
        
        $entity = new User();
	    $entity->setCode('CL42530423');
        $entity->setDni('');
	    $entity->setRuc('42530423');
	    $entity->setPhone('997082715');
	    $entity->setCreditLine(7880.34);
	    $entity->setBalance(5500.34);
        $entity->setPassword('123');
        $entity->setName('QQUELLON USCAPI DAVID');
        $entity->setLastName('');
        $entity->setEmail('szapata@koketa.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-9', $entity);
        
        $entity = new User();
	    $entity->setCode('CL10282944770');
        $entity->setDni('');
	    $entity->setRuc('10282944770');
	    $entity->setPhone('940793919');
	    $entity->setCreditLine(7880.34);
	    $entity->setBalance(5500.34);
        $entity->setPassword('123');
        $entity->setName('AIME YARIN KARINA ROCIO');
        $entity->setLastName('');
        $entity->setEmail('pcristobal@koketa.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-10', $entity);
        
        $entity = new User();
	    $entity->setCode('CL10272976703');
        $entity->setDni('');
	    $entity->setRuc('10272976703');
	    $entity->setPhone('954034917');
	    $entity->setCreditLine(9980.34);
	    $entity->setBalance(6500.34);
        $entity->setPassword('123');
        $entity->setName('DELGADO FERNANDEZ LUZDINA');
        $entity->setLastName('');
        $entity->setEmail('fmego@koketa.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-11', $entity);
        
        $entity = new User();
	    $entity->setCode('CL10189859398');
        $entity->setDni('');
	    $entity->setRuc('10189859398');
	    $entity->setPhone('94528353');
	    $entity->setCreditLine(7655.34);
	    $entity->setBalance(5500.34);
        $entity->setPassword('123');
        $entity->setName('CAMAN PORTAL CLEMENTE');
        $entity->setLastName('');
        $entity->setEmail('caman_portal@koketa.com');
        $entity->setProfile($profileClient);
	    $entity->setPointOfSaleActive($pointOfSale_3);
        $manager->persist($entity);
        
	    $pointOfSale_3->addUser($entity);
	    $manager->persist($pointOfSale_3);
        $this->addReference('user-12', $entity);

        
        
        



        $manager->flush();

    }

    public function getOrder()
    {
        // the order in which fixtures will be loaded
        // the lower the number, the sooner that this fixture is loaded
        return 4;
    }
}