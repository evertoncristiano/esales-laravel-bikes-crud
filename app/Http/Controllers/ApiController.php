<?php


namespace App\Http\Controllers;


class ApiController extends Controller
{
    private $headers;
    private $options;

    public function __construct()
    {
        $this->headers = ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'];
        $this->options = JSON_UNESCAPED_UNICODE;
    }

    private function response($data, $code)
    {
        return response()->json($data, $code, $this->headers, $this->options);
    }

    public function successResponse($data = true)
    {
        return $this->response($data, 200);
    }

    public function createdResponse($data)
    {
        return $this->response($data, 201);
    }

    public function notFoundResponse()
    {
        return $this->response(['message' => 'Record Not Found'], 404);
    }

    public function badRequestResponse($errors)
    {
        return $this->response(['message' => 'Bad Request', 'errors' => $errors], 400);
    }

    public function internalErrorResponse() {
        return $this->response(['message' => 'internal error'], 500);
    }
}
