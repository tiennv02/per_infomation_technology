<?php

namespace App\Repositories;

use App\Http\Responses\Response;
use App\Models\Users;

class UsersRepository extends BaseRepository
{

    /**
     * Create a new UserRepository instance.
     *
     * @param  App\Models\User $users
     * @return void
     */
    public function __construct(
        Users $users)
    {
        $this->model = $users;
    }

    /**
     * Save the User.
     *
     * @param  App\Models\User $users
     * @param  Array $inputs
     * @return void
     */
    private function save($users, $inputs)
    {
        $users->name = $inputs['name'];
        $users->email = $inputs['email'];
        $users->roles = 'admin';

        $users->save();
    }

    /**
     * Count the users.
     *
     * @return int
     */
    public function count()
    {
        return $this->model->count();
    }

    /**
     * Create a user.
     *
     * @param  array $inputs
     * @param  int $confirmation_code
     * @return App\Models\User
     */
    public function store($inputs, $remember_token = null)
    {
        $reponse = new Response();
        try {
            $users = new $this->model;
            $count = $users->where('email', '=', $inputs['email'])->count();
            if ($count > 0) {
                $reponse->setResultCode('ERROR');
                $reponse->setResultMessage('Email đã được sử dụng');
                return $reponse;
            }
            $users->password = bcrypt($inputs['password']);

            if ($remember_token) {
                $users->remember_token = $remember_token;
            }

            $this->save($users, $inputs);
            return $reponse;
        } catch (Exception $ex) {
            $reponse->setResultCode('ERROR');
            $reponse->setResultMessage($response->getResultMessage());
        }
        return $reponse;
    }

    /**
     * Update a user.
     *
     * @param  array $inputs
     * @param  App\Models\User $users
     * @return void
     */
    public function update($inputs, $users)
    {
        $users->confirmed = isset($inputs['confirmed']);

        $this->save($users, $inputs);
    }

    /**
     * Get statut of authenticated user.
     *
     * @return string
     */
    public function getStatut()
    {
        return session('statut');
    }

    /**
     * Valid user.
     *
     * @param  bool $valid
     * @param  int $id
     * @return void
     */
    public function valid($valid, $id)
    {
        $users = $this->getById($id);

        $users->valid = $valid == 'true';

        $users->save();
    }

    /**
     * Destroy a user.
     *
     * @param  App\Models\User $users
     * @return void
     */
    public function destroyUser(User $users)
    {
        $users->comments()->delete();

        $users->delete();
    }

    /**
     * Confirm a user.
     *
     * @param  string $confirmation_code
     * @return App\Models\User
     */
    public function confirm($confirmation_code)
    {
        $users = $this->model->whereConfirmationCode($confirmation_code)->firstOrFail();

        $users->confirmed = true;
        $users->confirmation_code = null;
        $users->save();
    }

}
