<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email',
        'password',
        'created_date'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules = [
        'email' => 'required|valid_email',
        'password' => 'required|min_length[6]',
        'created_date' => 'required|valid_date',
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'The email field is required.',
            'valid_email' => 'The email must be a valid email address.',
        ],
        'password' => [
            'required' => 'The password field is required.',
            'min_length' => 'The password must be at least 6 characters long.',
        ],
        'created_date' => [
            'required' => 'The created date field is required.',
            'valid_date' => 'The created date must be a valid date.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
