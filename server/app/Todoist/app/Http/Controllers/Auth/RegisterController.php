<?php

namespace App\Http\Controllers\Auth;

use App\DDD\Domain\User\User;
use App\DDD\Domain\User\UserEmail;
use App\DDD\Domain\User\UserHashedPassword;
use App\DDD\Domain\User\UserName;
use App\DDD\Service\UseCase\User\RegisterUserUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /** @var RegisterUserUseCase */
    private $registerUserUseCase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterUserUseCase $registerUserUseCase)
    {
        $this->registerUserUseCase = $registerUserUseCase;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->registerUserUseCase->execute(
            UserEmail::create($data["email"]),
            UserHashedPassword::create(Hash::make($data["password"])),
            UserName::create($data["name"])
        );
    }
}
