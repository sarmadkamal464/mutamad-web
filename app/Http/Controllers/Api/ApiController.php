<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * Return a JSON response with a success message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($message)
    {
        return response()->json(['message' => $message], 200);
    }

    /**
     * Return a JSON response with a collection of resources.
     *
     * @param mixed $resources
     * @return \Illuminate\Http\JsonResponse
     */
    public function collectionResponse($resources)
    {
        return response()->json(['data' => $resources], 200);
    }

    /**
     * Return a JSON response with a single resource.
     *
     * @param mixed $resource
     * @return \Illuminate\Http\JsonResponse
     */
    public function resourceResponse($resource)
    {
        return response()->json(['data' => $resource], 200);
    }

    /**
     * Return a JSON response with an error message.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($message, $status)
    {
        return response()->json(['error' => $message], $status);
    }

    /**
     * Handle validation errors and return a JSON response with the errors.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Validation\Validator $validator
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationErrorResponse(Request $request, $validator)
    {
        return response()->json(['errors' => $validator->errors()], 400);
    }
}
