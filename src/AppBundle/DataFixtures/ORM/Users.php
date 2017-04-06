<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Yaml\Parser;

/**
 * Users class.
 *
 * @package AppBundle\DataFixtures\ORM
 * @author Haracewiat <contact@haracewiat.pl>
 */
class Users extends AbstractFixture implements ContainerAwareInterface
{

    use ContainerAwareTrait;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = $this->loadUsers();

        /** @var UserManager $um */
        $um = $this->container->get('fos_user.user_manager');

        foreach ($users as $k => $v) {
            $user = $um->createUser();

            $user->setUsername($k);
            $user->setPlainPassword($v['password']);
            $user->setEnabled(true);
            $user->setRoles($v['roles']);
            $user->setEmail($v['email']);

            $um->updateUser($user);

            $this->setReference($k, $user);
        }
    }

    protected function loadUsers()
    {
        $parser = new Parser();
        $users = $parser->parse(file_get_contents(implode(DIRECTORY_SEPARATOR,
            array(
                $this->container->getParameter('kernel.root_dir'),
                '..', 'src', 'AppBundle', 'Resources', 'fixtures', 'users.yml',
            )
        )));

        return $users;
    }

}
