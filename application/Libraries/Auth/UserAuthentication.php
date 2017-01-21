<?php

namespace Application\Libraries\Auth;

use Application\Libraries\Helper;
use Application\Libraries\Database\ForumDAO;

class UserAuthentication
{
    private $forumDAO;

    public function __construct(ForumDAO $forumDAO)
    {
        $this->forumDAO = $forumDAO;
    }

    public function login($username, $password) {
        return $this->forumDAO->findUserByCredential('user_credentials', $username, Helper::bcrypt($password));
    }
}