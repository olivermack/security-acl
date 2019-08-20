<?php

namespace Symfony\Component\Security\Acl\Model;

interface SecurityIdentityFactoryInterface
{
    /**
     * Creates a security identity for the given identifier
     * @param string $securityIdentifier
     * @param bool   $isUsername
     * @return SecurityIdentityInterface
     */
    public function identityFromIdentifier($securityIdentifier, $isUsername);

    /**
     * Creates a security identity for the given identifier
     * @param SecurityIdentityInterface $identity
     * @return string
     */
    public function identifierFromIdentity(SecurityIdentityInterface $identity);

    /**
     * Determines if the factory can handle the given implementation of an identity
     * @param SecurityIdentityInterface $identity
     * @return bool
     */
    public function supportsIdentity(SecurityIdentityInterface $identity);

    /**
     * Determines if the factory can handle the given string based identifier
     * @param string $identifier
     * @return bool
     */
    public function supportsIdentifier($identifier);
}
