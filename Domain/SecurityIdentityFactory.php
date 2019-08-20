<?php

namespace Symfony\Component\Security\Acl\Domain;

use Symfony\Component\Security\Acl\Model\SecurityIdentityFactoryInterface;

class SecurityIdentityFactory implements SecurityIdentityFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createFromSecurityIdentifier($securityIdentifier, $isUsername = false)
    {
        if ($isUsername) {
            return new UserSecurityIdentity(
                substr($securityIdentifier, 1 + $pos = strpos($securityIdentifier, '-')),
                substr($securityIdentifier, 0, $pos)
            );
        } else {
            return new RoleSecurityIdentity($securityIdentifier);
        }
    }
}
