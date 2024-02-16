<?php

class Codigos{

    function __construct(){

    }

    public static function success($data = null)
    {
        return self::getResponse(200, 'OK', $data);
    }

    public static function created($data = null)
    {
        return self::getResponse(201, 'Created', $data);
    }

    public static function badRequest($message = 'Bad Request')
    {
        return self::getResponse(400, $message);
    }

    public static function unauthorized($message = 'Unauthorized')
    {
        return self::getResponse(401, $message);
    }

    public static function notFound($message = 'Not Found')
    {
        return self::getResponse(404, $message);
    }

    public static function internalServerError($message = 'Internal Server Error')
    {
        return self::getResponse(500, $message);
    }

    private static function getResponse($statusCode, $statusMessage, $data = null)
    {
        $response = [
            'status' => $statusCode,
            'message' => $statusMessage,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        header('Content-Type: application/json');
        http_response_code($statusCode);

        return json_encode($response);
    }

}

?>