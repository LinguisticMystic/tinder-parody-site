<?php

namespace App\Validators;

class RegistrationValidator extends LoginValidator
{
    protected static array $fields = ['username', 'sex', 'password', 'confirmPassword'];

    protected function validateForm(): void
    {
        $this->validateUsername();
        $this->validatePassword();
        $this->validateSex();
        $this->validateConfirmPassword();
    }

    protected function validateSex(): void
    {
        $value = $this->postData['sex'];

        if (empty($value)) {
            $this->addError('sex', 'sex cannot be empty');
        }
    }

    protected function validateConfirmPassword(): void
    {
        $value = $this->postData['confirmPassword'];

        if (empty($value)) {
            $this->addError('confirmPassword', 'please confirm password');
        } elseif ($value != $this->postData['password']) {
            $this->addError('confirmPassword', 'passwords don\'t match');
        }
    }

}