<?php

namespace App\Models;

use App\Config\Table;

class PollModel extends BaseModel
{
    protected $table = Table::POLL;

    protected $allowedFields = ['poll_name', 'vote_id', 'title', 'vote_count'];

    public function getPollByVoteIdAndName($vote_id, $name): ?array
    {
        return $this->db->table($this->table)
            ->where('vote_id', $vote_id)
            ->where('name', $name)
            ->get()->getRowArray();
    }
}
