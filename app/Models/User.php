<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{

    protected $table            = 'user';

    protected $allowedFields    = [
        'name',
        'username',
        'password',
        'email',
        'role_id',
        'pass_reset_token',
        'pass_reset_status',
        'status',
        'created_at',
        'updated_at'
    ];

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

    public function checkEmail(string $email): array
    {
        $builder = $this->select("id, username, email");
        $builder->where("email", $email);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return [];
        }
    }

    public function newPassResetToken(int $id, string $token)
    {
        $builder = $this->db->table('user');
        $builder->where("id", $id);
        $builder->update(
            [
                'pass_reset_token' => $token,
                'pass_reset_status' => 1,
                'updated_at' => date('Y-m-d h:i:s')
            ]
        );
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkPassResetToken(string $token)
    {
        $builder = $this->db->table('user');
        $builder->select("id, username, email");
        $builder->where("pass_reset_token", $token);
        $builder->where("pass_reset_status", 1);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return [];
        }
    }

    public function updatePassword(string $token, string $newPass)
    {
        $builder = $this->db->table('user');
        $builder->where("pass_reset_token", $token);
        $builder->update(
            [
                'password' => $newPass,
                'pass_reset_status' => 0
            ]
        );
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
