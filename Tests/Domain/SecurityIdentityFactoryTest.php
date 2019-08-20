<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Acl\Tests\Domain;

use Symfony\Component\Security\Acl\Domain\RoleSecurityIdentity;
use Symfony\Component\Security\Acl\Domain\SecurityIdentityFactory;
use Symfony\Component\Security\Acl\Domain\UserSecurityIdentity;

class SecurityIdentityFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var SecurityIdentityFactory */
    private $sut;

    public function setUp()
    {
        $this->sut = new SecurityIdentityFactory();
    }

    public function testCreatesUserSecurityIdentity()
    {
        $sid = 'Acme\DemoBundle\Proxy\__CG__\Symfony\Component\Security\Acl\Tests\Domain\Foo-foo';
        $result = $this->sut->identityFromIdentifier($sid, true);
        $expected = new UserSecurityIdentity('foo', 'Acme\DemoBundle\Proxy\__CG__\Symfony\Component\Security\Acl\Tests\Domain\Foo');

        $this->assertEquals($expected, $result);
    }

    public function testCreatesRoleSecurityIdentity()
    {
        $sid = 'SOME_ROLE';
        $result = $this->sut->identityFromIdentifier($sid);
        $expected = new RoleSecurityIdentity('SOME_ROLE');

        $this->assertEquals($expected, $result);
    }
}
