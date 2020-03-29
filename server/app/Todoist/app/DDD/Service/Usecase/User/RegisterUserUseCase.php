<?php

namespace App\DDD\Service\UseCase\User;

use App\DDD\Domain\User\User;
use App\DDD\Domain\User\UserEmail;
use App\DDD\Domain\User\UserHashedPassword;
use App\DDD\Domain\User\UserName;
use App\DDD\Infrastructure\User\UserRepository;
use App\DDD\Service\UseCase\Project\StoreDefaultProjectUseCase;

class RegisterUserUseCase
{

    /** @var StoreDefaultProjectUseCase */
    private $storeDefaultProjectUseCase;

    /** @var UserRepository */
    private $userRepository;

    public function __construct(StoreDefaultProjectUseCase $storeDefaultProjectUseCase, UserRepository $userRepository)
    {
        $this->storeDefaultProjectUseCase = $storeDefaultProjectUseCase;
        $this->userRepository = $userRepository;
    }

    public function execute(UserEmail $email, UserHashedPassword $hashedPassword, UserName $name): User
    {
        $user = $this->userRepository->save(User::create($email, $hashedPassword, $name));
        $this->storeDefaultProjectUseCase->execute($user->getId());
        return $user;
    }
}
