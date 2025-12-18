<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class ApiController
{
    private function jsonResponse(array $data, int $status = 200): Response
    {
        return new Response(
            json_encode($data, JSON_PRETTY_PRINT),
            $status,
            ['Content-Type' => 'application/json']
        );
    }

    public function health(): Response
    {
        return $this->jsonResponse([
            'status' => 'success',
            'message' => 'Hello from Laravel! Backend is running successfully.',
            'data' => [
                'app_name' => config('app.name', 'Maliha Demo'),
                'php_version' => PHP_VERSION,
                'laravel_version' => app()->version(),
                'environment' => config('app.env', 'production'),
                'timestamp' => date('c'),
            ]
        ]);
    }

    public function demo(): Response
    {
        $users = [
            ['id' => 1, 'name' => 'Maliha', 'role' => 'Developer'],
            ['id' => 2, 'name' => 'Teacher', 'role' => 'DevOps Engineer'],
            ['id' => 3, 'name' => 'Student', 'role' => 'Learner'],
        ];

        return $this->jsonResponse([
            'status' => 'success',
            'message' => 'Demo data retrieved successfully',
            'data' => [
                'users' => $users,
                'total_count' => count($users),
            ]
        ]);
    }

    public function info(): Response
    {
        return $this->jsonResponse([
            'status' => 'success',
            'message' => 'System information',
            'architecture' => [
                'frontend' => [
                    'technology' => 'React 18',
                    'container' => 'nginx:alpine',
                    'description' => 'Serves static files and handles client-side routing'
                ],
                'backend' => [
                    'technology' => 'Laravel 10 + PHP 8',
                    'container' => 'php:8.2-fpm-alpine',
                    'description' => 'Handles API requests and business logic'
                ],
                'webserver' => [
                    'technology' => 'Nginx',
                    'container' => 'nginx:alpine',
                    'description' => 'Reverse proxy - routes traffic to frontend/backend'
                ],
                'orchestration' => [
                    'technology' => 'Docker Compose',
                    'description' => 'Manages all containers as a single application'
                ]
            ]
        ]);
    }
}
