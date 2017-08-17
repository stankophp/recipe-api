<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class ApiController extends Controller
{
    protected $statusCode = SymfonyResponse::HTTP_OK;

    /**
     * @param $code
     * @return $this
     */
    public function setStatusCode($code)
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondNotFound($message = 'Not found')
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithError($message)
    {
        return $this->respond([
            'data' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondCreated($message)
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_CREATED)
            ->respond([
                'status' => 'success',
                'message' => $message,
            ]);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondUpdated($message)
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_ACCEPTED)
            ->respond([
                'status' => 'success',
                'message' => $message,
            ]);
    }

    /**
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondFailedValidation($message)
    {
        return $this->setStatusCode(SymfonyResponse::HTTP_UNPROCESSABLE_ENTITY)
            ->respond([
                'status' => 'failed',
                'message' => $message,
            ]);
    }

    /**
     * @param Paginator $items
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithPagination(Paginator $items, $data)
    {
        $data = array_merge($data, [
            'paginator' => [
                'total_count' => $items->getTotal(),
                'total_pages' => $items->lastPage(),
                'current_page' => $items->getCurrentPage(),
                'limit' => $items->getTotal(),
            ]
        ]);
        return $this->respond($data);
    }

    /**
     * @param $data
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }
}