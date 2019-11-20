<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * UserController Class controller
 * @package App\Http\Controllers
 * @author Mohamed Faesal <mohamed.feasal@gmail.com>
 */
class UserController extends BaseController
{
    /**
     * @var UserRepository user repository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * get users by criteria
     * @param Request $request
     * @return array
     */
    public function getUsers(Request $request)
    {
        return ['users' => $this->userRepository->getUsersByCriteria($request->all())];
    }
}
