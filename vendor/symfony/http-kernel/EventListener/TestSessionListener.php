<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

trigger_deprecation('symfony/http-kernel', '5.4', '"%s" is deprecated, use "%s" instead.', TestSessionListener::class, SessionListener::class);

/**
 * Sets the session in the request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 *
<<<<<<< HEAD
 * @deprecated since Symfony 5.4, use SessionListener instead
=======
 * @deprecated the TestSessionListener use the default SessionListener instead
>>>>>>> 7226ba94aa59a96a75d40f0f901cbb8862fe68e0
 */
class TestSessionListener extends AbstractTestSessionListener
{
    private $container;

    public function __construct(ContainerInterface $container, array $sessionOptions = [])
    {
        $this->container = $container;
        parent::__construct($sessionOptions);
    }

    /**
     * @deprecated since Symfony 5.4, will be removed in 6.0.
     */
    protected function getSession(): ?SessionInterface
    {
<<<<<<< HEAD
=======
        trigger_deprecation('symfony/http-kernel', '5.4', '"%s" is deprecated and will be removed in 6.0, inject a session in the request instead.', __METHOD__);

>>>>>>> 7226ba94aa59a96a75d40f0f901cbb8862fe68e0
        if ($this->container->has('session')) {
            return $this->container->get('session');
        }

        return null;
    }
}
