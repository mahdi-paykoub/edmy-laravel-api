<?php


namespace App\RestfulApi;


class ApiResponse
{
    private $message;
    private $data;
    private int $status = 200;
    private array $appends = [];


    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param string|null $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function response()
    {
        $body = [];
        !is_null($this->message) && $body['message'] = $this->message;
        !is_null($this->data) && $body['data'] = $this->data;
        $body = $body + $this->appends;


        return response()->json($body, $this->status);
    }
}
