<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{

    protected $table            = 'user';

    protected $allowedFields    = ['name', 'username', 'password', 'email', 'role_id', 'status'];

    /**
     * Retorna um usuário pelo seu e-mail
     *
     * @param string $email
     * @return array
     */
    public function getByEmail(string $email): array
    {
        $rq = $this->where('email', $email)->first();

        return !is_null($rq) ? $rq : [];
    }
}
