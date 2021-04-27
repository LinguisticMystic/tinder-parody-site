<?php

namespace App\Validators;

class LoginValidator
{
    protected array $postData;
    protected array $errors = [];
    protected static array $fields = ['username', 'password'];

    public function __construct(array $postData)
    {
        $this->postData = $postData;
    }

    public function validateFields(): array
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->postData)) {
                $this->addError('field', $field . ' is missing');
                return $this->errors;
            }
        }
        $this->validateForm();
        return $this->errors;
    }

    protected function validateForm()
    {
        $this->validateUsername();
        $this->validatePassword();
    }

    protected function validateUsername(): void
    {
        $value = trim($this->postData['username']);

        if (empty($value)) {
            $this->addError('username', 'username cannot be empty');
        } elseif (strlen($value) < 4 || strlen($value) > 12) {
            $this->addError('username', 'username requires 4-12 characters');
        } elseif (!preg_match('/^[a-zA-Z0-9_]*$/', $value)) {
            $this->addError('username', 'username must be alphanumeric');
        }
    }

    protected function validatePassword(): void
    {
        $value = $this->postData['password'];

        if (empty($value)) {
            $this->addError('password', 'password cannot be empty');
        } elseif (strlen($value) < 4) {
            $this->addError('username', 'password requires at least 4 characters');
        } elseif (strlen($value) > 128) {
            $this->addError('username', 'no more than 128 characters');
        }
    }

    protected function addError(string $key, string $errorMessage): void
    {
        $this->errors[$key] = $errorMessage;
    }
}