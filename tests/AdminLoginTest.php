<?php

use PHPUnit\Framework\TestCase;

class AdminLoginTest extends TestCase
{
    public function testAdminLogin()
    {
        // Set up the test data
        $username = 'admin';
        $password = 'admin123';

        // Make an HTTP request to login.php with the test data
        $url = 'http://192.168.20.4/schoolmanagement/pages/login.php'; // Replace with the actual URL
        // D:\schoolmanagement\schoolmanagement\test-repo-php\main\schoolmanagement\pages\login.php
        // $url = 'D:/schoolmanagement/schoolmanagement/test-repo-php/main/schoolmanagement/pages/login.php';
        
        $postData = http_build_query([
            'id' => $username,
            'password' => $password,
            'submit' => 'login'
        ]);

        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => $postData
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        // Assert the expected result
        $this->assertContains('Login success', $result, 'Admin login failed');
    }
}