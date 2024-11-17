<?php

namespace App\Models;

use App\Config\Table;

class VoteModel extends BaseModel
{
    protected $table = Table::VOTE;

    protected $allowedFields = ['token', 'title', 'description', 'expired_at'];
}
