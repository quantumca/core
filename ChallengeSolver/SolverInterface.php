<?php

/*
 * This file is part of the ACME PHP library.
 *
 * (c) Titouan Galopin <galopintitouan@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AcmePhp\Core\ChallengeSolver;

use AcmePhp\Core\Protocol\AuthorizationChallenge;

/**
 * ACME challenge solver.
 *
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
interface SolverInterface
{
    /**
     * Determines whether or not the solver supports a given Challenge.
     *
     * @param string $type The type of the solver
     *
     * @return bool The solver supports the given challenge's type
     */
    public function supports($type);

    /**
     * Solve the given authorization challenge.
     *
     * @param AuthorizationChallenge $authorizationChallenge
     */
    public function solve(AuthorizationChallenge $authorizationChallenge);

    /**
     * Internally validate the challenge by performing the same kind of test than the CA.
     *
     * @param AuthorizationChallenge $authorizationChallenge
     * @param int                    $timeout
     */
    public function validate(AuthorizationChallenge $authorizationChallenge, $timeout = 60);

    /**
     * Cleanup the environments after a successful challenge.
     *
     * @param AuthorizationChallenge $authorizationChallenge
     */
    public function cleanup(AuthorizationChallenge $authorizationChallenge);
}
