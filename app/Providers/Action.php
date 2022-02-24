<?php

namespace App\Providers;

use Symfony\Component\HttpFoundation\Response;
use App\Models\Explanation;
use File;

class Action {

    /**
     * All reusable actions (GET,POST).
     * @return Json
     */

    // Edit
    public function edit($model, $id) {

        $values = $model::find($id);

        return $values ? response()->json($values) 
            : $this->failedResponse();

        return $this->successfulResponse();
    }

    // Edit with status
    public function editWithDescription($model,$id) {

        $values = $model::where('id', $id)->with('explanations:explainable_id,explanation')->first();

        return response()->json($values);
    }
    
    // Delete
    public function delete($model, $id) {
        // Why did not try catch work?
        $values = $model::find($id);

        return $values ? $values->delete() 
                : $this->failedResponse();

        return $this->successfulResponse();
    }

    // Delete with image
    public function deleteWithImage($id) {

        $modelImage = Media::find($id);
        if($modelImage) {

            File::delete(public_path("images/" . $modelImage->url)); 
            $modelImage->delete();

        } else {
            return $this->failedResponse();
        }
        return $this->successfulResponse();
    }

    public function getDescription($model) {

        return Explanation::select('id', 'explanation')->where('explainable_type', $model)->get();
    }

    // Response with error
    public function failedResponse() {
        return response()->json(['error' => 'No data was found'], Response::HTTP_NOT_FOUND);
    }

    // Response with success
    public function successfulResponse() {
        return response()->json(['success' => 'It was successfully deleted'], Response::HTTP_OK);
    }
}