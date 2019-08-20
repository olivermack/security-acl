<?php

namespace Symfony\Component\Security\Acl\Model;

interface SecurityIdentityFactoryInterface
{
    /**
     * Creates a security identity for the given identifier
     * @param string $securityIdentifier
     * @param bool   $isUsername
     */
    public function createFromSecurityIdentifier($securityIdentifier, $isUsername);
}
