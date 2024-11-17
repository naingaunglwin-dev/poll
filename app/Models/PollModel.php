<?php

namespace App\Models;

use App\Config\Table;

class PollModel extends BaseModel
{
    protected $table = Table::POLL;

    protected $allowedFields = ['poll_name', 'vote_id', 'title', 'vote_count'];
}
