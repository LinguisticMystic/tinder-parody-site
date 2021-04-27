<?php

namespace App\Validators;

class UploadValidator
{
    protected array $postData;
    protected array $errors = [];
    protected static array $fields = ['file'];

    public function __construct(array $postData)
    {
        $this->postData = $postData;
    }

    public function validate(): array
    {
        foreach (self::$fields as $field) {
            if (!array_key_exists($field, $this->postData)) {
                $this->addError('field', $field . ' is missing');
                return $this->errors;
            }
        }
        $this->validateFile();
        return $this->errors;
    }

    protected function validateFile(): void
    {
        $fileName = $this->postData['file']['name'];
        $mimeType = mime_content_type($this->postData['file']['tmp_name']);
        $fileSize = $this->postData['file']['size'];

        if (empty($fileName)) {
            $this->addError('file', 'no file added');
        } elseif (!in_array($mimeType, ['image/jpeg', 'image/png'])) {
            $this->addError('file', 'only .jpg and .png formats allowed');
        } elseif ($fileSize > 2000000) {
            $this->addError('file', 'accepted file size is 2MB');
        }
    }

    protected function addError(string $key, string $errorMessage): void
    {
        $this->errors[$key] = $errorMessage;
    }
}