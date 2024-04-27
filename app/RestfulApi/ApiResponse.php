<?php


namespace App\RestfulApi;


class ApiResponse
{
    // message must be array
    // appends must be array
    private $message;
    private $data;
    private int $status = 200;
    private $appends;


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
        
    public function setAppends($appends)
    {
        $this->appends = $appends;
    }

    public function response()
    {
        $body = [];
        !is_null($this->message) && $body['message'] = $this->message;
        !is_null($this->data) && $body['data'] = $this->data;
        !is_null($this->appends) && $body['appends'] = $this->appends;


        return response()->json($body, $this->status);
    }
}
