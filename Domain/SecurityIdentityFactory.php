<?php

namespace Symfony\Component\Security\Acl\Domain;

use Symfony\Component\Security\Acl\Model\SecurityIdentityFactoryInterface;
use Symfony\Component\Security\Acl\Model\SecurityIdentityInterface;

class SecurityIdentityFactory implements SecurityIdentityFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function identityFromIdentifier($securityIdentifier, $isUsername = false)
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

    /**
     * {@inheritdoc}
     */
    public function identifierFromIdentity(SecurityIdentityInterface $identity)
    {
        if ($identity instanceof UserSecurityIdentity) {
            return $identity->getClass().'-'.$identity->getUsername();
        } elseif ($identity instanceof RoleSecurityIdentity) {
            return $identity->getRole();
        }

        throw new \InvalidArgumentException('$identity must either be an instance of UserSecurityIdentity, or RoleSecurityIdentity.');
    }


    /**
     * {@inheritdoc}
     */
    public function supportsIdentity(SecurityIdentityInterface $identity)
    {
        return $identity instanceof UserSecurityIdentity
            || $identity instanceof RoleSecurityIdentity;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsIdentifier($identifier)
    {
        return true;
    }
}
