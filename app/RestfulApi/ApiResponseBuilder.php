<?php


namespace App\RestfulApi;


class ApiResponseBuilder
{
    private ApiResponse $response;


    public function __construct()
    {
        $this->response = new ApiResponse();
    }

    public function withMessage($message){
        $this->response->setMessage($message);
        return $this;
    }
    public function withData($data){
        $this->response->setData($data);
        return $this;
    }
    public function withStatus(int $status){
        $this->response->setStatus($status);
        return $this;
    }

    public function build() : ApiResponse{
        return $this->response;
    }
}
