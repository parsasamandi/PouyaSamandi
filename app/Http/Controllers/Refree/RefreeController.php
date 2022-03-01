<?php

namespace App\Http\Controllers\Refree;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRefreeRequest;
use App\Providers\Action;
use App\DataTables\Refree\RefreeDataTable;
use App\Models\Refree;
use App\Models\Explanation;
use Illuminate\Http\Request;
use File;
use DB;

class RefreeController extends Controller
{
    public $action;

    public function __construct()
    {
        $this->action = new Action();
    }

    public $refree = '\App\Models\Refree';

    // Refree Table
    public function list(Request $request)
    {

        // DataTable
        $dataTable = new RefreeDataTable();

        $vars['refreeTable'] = $dataTable->html();

        $vars['descriptions'] = $this->action->getDescription(Refree::class);

        return view('refree.list', $vars);
    }

    // DataTable
    public function refreeTable(RefreeDataTable $dataTable)
    {
        return $dataTable->render('refree.list');
    }

    // Store refree
    public function store(StoreRefreeRequest $request)
    {

        DB::transaction(function () use ($request) {

            $id = $request->get('id');

            // Image
            $image = $request->file('image');
            $originalImage = $image->getClientOriginalName();
            $image->move(public_path('images'), $originalImage);

            $refree = Refree::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $request->get('name'), 'link' => $request->get('link'),
                    'image' => $originalImage
                ]
            );  

            if ($request->has('descriptions')) {
                $refree->explanations()->updateOrCreate(['explainable_id' => $id], ['explanation' => $request->get('descriptions'),]);
            }
        });

        return $this->getAction($request->get('button_action'));
    }

    // Edit
    public function edit(Request $request)
    {
        return $this->action->editWithDescription($this->refree, $request->get('id'));
    }

    // Delete
    public function delete($id)
    {
        return $this->action->delete($this->refree, $id);

        // Deleting Image
        $refree = Refree::find($id);
        File::delete(public_path("images/" . $modelImage->url)); 

    }
}
