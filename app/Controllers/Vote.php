<?php

namespace App\Controllers;

use App\Models\PollModel;
use App\Models\VoteModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Ramsey\Uuid\Uuid;

class Vote extends BaseController
{
    public function setup($token = 0): string|\CodeIgniter\HTTP\RedirectResponse
    {
        $data = [];

        if ($token == 0) {
            $voteModel = new VoteModel();

            $vote = $voteModel->getEntity();
            $poll = [
                [
                    'name'  => 'poll1',
                    'title' => ''
                ],
                [
                    'name'  => 'poll2',
                    'title' => ''
                ],
            ];

            $mode = 'new';
        } else {

            $token = base64_decode($token);

            $token = urldecode($token);

            $voteModel = new VoteModel();

            $vote = $voteModel->where('token', $token)->first();

            if (empty($vote)) {
                throw PageNotFoundException::forPageNotFound();
            }

            $pollModel = new PollModel();

            $poll = $pollModel->where('vote_id', $vote['id'])->findAll();

            $mode = 'exist';
        }

        if ($this->request->getPost()) {
            $newtoken = str_replace('-', '', Uuid::uuid4()->toString());

            $rules = [
                'title' => 'required',
                'description' => 'permit_empty',
                'poll.poll1' => 'required',
                'poll.poll2' => 'required',
            ];

            if ($this->validate($rules)) {
                $data = [
                    'id'    => $vote['id'] ?: null,
                    'token' => $vote['token'] ?: $newtoken,
                    'title' => $this->request->getPost('title'),
                    'description' => $this->request->getPost('description') ?: null,
                    // 'expired_at' => $this->request->getPost('expired_at') ?: 1,
                    'expired_at' => 1,
                ];

                $voteModel = new VoteModel();
                $voteModel->save($data);

                $newId = $voteModel->getInsertID();
                $id = $newId ?: $vote['id'];

                foreach ($this->request->getPost('poll') as $field => $value) {
                    if (empty($value)) continue;

                    $pollModel = new PollModel();

                    if ($poll = $pollModel->getPollByVoteIdAndName($id, $field)) {
                        $pollModel->save([
                            'id' => $poll['id'],
                            'title' => $value,
                        ]);

                        $mode = 'exists';
                    } else {
                        $pollModel->save([
                            'id' => null,
                            'name' => $field,
                            'vote_id' => $id,
                            'title' => $value,
                        ]);
                    }
                }

                if ($this->request->getPost('remove')) {
                    foreach ($this->request->getPost('remove') as $field) {
                        $pollModel = new PollModel();
                        if ($poll = $pollModel->getPollByVoteIdAndName($vote['id'], $field)) {
                            $pollModel->delete($poll['id']);
                            $mode = 'exists';
                        }
                    }
                }

                $message = $mode === 'new'
                    ? 'Poll has been created.<br>You can copy url in bottom'
                    : 'Poll has been updated';

                session()->setFlashdata('message', $message);

                $encode = base64_encode(urlencode($data['token']));

                if (str_ends_with($encode, '=')) {
                    $encode = rtrim($encode, '=');
                }

                return redirect()->to('setup/' . $encode);

            } else {
                $data['error'] = $this->validator->getErrors();
            }
        }

        $data['vote']    = $vote;
        $data['poll']    = $poll;
        $data['message'] = session()->getFlashdata('message');

        return $this->view('vote/setup', $data);
    }

    public function share($token): string
    {
        $voteModel = new VoteModel();

        $vote = $voteModel->where('token', $token)->first();

        if (empty($vote)) {
            throw PageNotFoundException::forPageNotFound();
        }

        $pollModel = new PollModel();

        $poll = $pollModel->where('vote_id', $vote['id'])->findAll();

        $data['poll']       = $poll;
        $data['poll_title'] = $vote['title'];
        $data['poll_desc']  = $vote['description'];
        $data['token']      = $vote['token'];

        return $this->view('vote/share', $data);
    }

    public function vote(): \CodeIgniter\HTTP\RedirectResponse
    {
        $id = $this->request->getPost('poll');

        $voteCategoryModel = new PollModel();

        $poll = $voteCategoryModel->find($id);

        if (empty($poll)) {
            throw PageNotFoundException::forPageNotFound();
        }

        $updateVoteCount = $poll['vote_count'] + 1;

        $voteCategoryModel->save([
            'id' => $id,
            'vote_count' => $updateVoteCount,
        ]);

        return redirect()->to('vote/result/' . $this->request->getPost('token'));
    }
}
