<?php

namespace App\Traits;

trait CategoryApiResponseTrait
{

    public function CategoryApiResponse($data= null,$message = null,$status = null){

        $array = [
            'data'=>$data,
            'message'=>$message,
            'status'=>$status,
        ];

        return response($array,$status);

    }


}
