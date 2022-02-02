<?php

namespace App\Http\Controllers\Refree;

use Illuminate\Http\Request;
use App\Models\Explanation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDescriptionRequest;
use App\DataTables\Refree\DescriptionDataTable;
use App\Providers\Action;
use DB;

class DescriptionController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    // Datatable To blade
    public function list() {
        
        $dataTable = new DescriptionDataTable();

        // refree description Table
        $vars['refreeDescriptionTable'] = $dataTable->html();

        return view('refree.descriptionlist', $vars);
    }

    // Get course comment
    public function skillDescriptionTable(DescriptionDataTable $dataTable) {
        return $dataTable->render('skill.descriptionList');
    }

    
    // Store
    public function store(StoreDescriptionRequest $request) {

        Explanation::updateOrCreate(
            ['id' => $request->get('id')],
            ['explanation' => $request->get('description')]
        );

        // Insert
        if($request->get('button_action') == "insert") {
            $success_output = $this->getInsertionMessage();
        }

        // Update
        else if($request->get('button_action') == "update") {
            $success_output = $this->getUpdateMessage();
        }

        return $this->getAction($request->get('button_action'));
    }

    // Edit
    public function edit(Request $request) {
        return $this->action->edit(Explanation::class, $request->get('id')); 
    }

    // Delete
    public function delete($id) {
        return $this->action->delete(Explanation::class, $id);
    }

}
