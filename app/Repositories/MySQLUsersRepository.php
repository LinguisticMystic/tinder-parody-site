<?php

namespace App\Repositories;

use App\Models\User;
use Medoo\Medoo;

class MySQLUsersRepository implements UsersRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'tinder',
            'server' => 'localhost',
            'username' => $_ENV['MYSQL_USERNAME'],
            'password' => $_ENV['MYSQL_PASSWORD']
        ]);
    }

    public function addUser(User $user): void
    {
        $this->database->insert('users', [
            'username' => $user->username(),
            'password' => $user->password(),
            'sex' => $user->sex()
        ]);
    }

    public function findUserID(string $username): ?int
    {
        $userID = $this->database->select('users', [
            'id'
        ], [
            'username' => $username
        ]);

        return $userID[0]['id'];
    }

    public function findUsernameByID(int $userID): ?string
    {
        $username = $this->database->select('users', [
            'username'
        ], [
            'id' => $userID
        ]);

        return $username[0]['username'];
    }

    public function findUserPassword(int $userID): string
    {
        $username = $this->database->select('users', [
            'password'
        ], [
            'id' => $userID
        ]);

        return $username[0]['password'];
    }

    public function userSex(int $userID): string
    {
        $sex = $this->database->select('users', [
            'sex'
        ], [
            'id' => $userID
        ]);

        return $sex[0]['sex'];
    }

    public function usernameExists(string $username): bool
    {
        $username = $this->database->select('users', [
            'username'
        ], [
            'username' => $username
        ]);

        return !empty($username);
    }

    public function pickOppositeSexUsers(int $userID, string $sex)
    {
        //select users of opposite sex, that are not rated, that have a picture
        //SELECT id FROM users WHERE $sex = 'male'
        //AND id IN (SELECT user_id FROM pictures);
        //AND id NOT IN (SELECT rated_user_id FROM ratings WHERE user_id = $userID)

        $ratedUsers = $this->ratedUserIDs($userID);
        $usersWithPicture = $this->userIDsWithPicture();

        if (empty($ratedUsers)) {
            return $this->database->select('users', [
                'id'
            ], [
                'sex' => $sex,
                'id' => $usersWithPicture
            ]);
        }

        return $this->database->select('users', [
            'id'
        ], [
            'sex' => $sex,
            'id' => $usersWithPicture,
            'id[!]' => $ratedUsers
        ]);
    }

    private function ratedUserIDs($userID): array
    {
        $ratedUsersArray = $this->database->select('ratings', [
            'rated_user_id'
        ], [
            'user_id' => $userID
        ]);

        $ratedUsers = [];
        foreach ($ratedUsersArray as $ratedUserArray) {
            $ratedUsers[] = $ratedUserArray['rated_user_id'];
        }

        return $ratedUsers;
    }

    private function userIDsWithPicture(): array
    {
        return $this->database->select('pictures', 'user_id');
    }
}