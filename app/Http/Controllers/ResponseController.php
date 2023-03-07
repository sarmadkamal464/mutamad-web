<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ResponseController extends Controller
{
    /**
     * Return a JSON response with a success message.
     *
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function successResponse($request, $message, $success = true)
    {
        if ($request->device_type != "web")
            return response()->json(['message' => $message, 'success' => $success], 200);
        Session::flash('message', $message);
        return redirect()->back()->with("message", $message);
    }

    /**
     * Return a JSON response with a collection of resources.
     *
     * @param mixed $resources
     * @return \Illuminate\Http\JsonResponse
     */
    public function collectionResponse($request, $resources, $success = true)
    {
        if ($request->device_type != "web")
            return response()->json(['data' => $resources, 'success' => $success], 200);
        return redirect()->back()->with($resources);
    }

    /**
     * Return a JSON response with a single resource.
     *
     * @param mixed $resource
     * @return \Illuminate\Http\JsonResponse
     */
    public function resourceResponse($request, $resource, $success = true)
    {
        return ($request->device_type != "web") ? response()->json(['data' => $resource, 'success' => $success], 200) : redirect()->back()->with($resource);
    }

    /**
     * Return a JSON response with an error message.
     *
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function errorResponse($request, $message,  $status, $success = false)
    {
        if ($request->device_type != "web")
            return response()->json(['errors' => $message, 'success' => $success], $status);
        return redirect()->back()->withErrors($message);
    }

    /**
     * Handle validation errors and return a JSON response with the errors.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Validation\Validator $validator
     * @return \Illuminate\Http\JsonResponse
     */
    public function validationErrorResponse($request, $validator)
    {
        $errors = $validator->errors()->toArray();
        foreach ($errors as $key => $error) {
            $errors[$key] = implode(" ", $error);
        }
        return ($request->device_type != "web") ? response()->json(['errors' => $errors], 400) :  redirect()->back()->withErrors($validator->errors());
    }
}
