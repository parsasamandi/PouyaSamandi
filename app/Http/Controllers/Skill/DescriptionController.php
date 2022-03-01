<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Models\Explanation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDescriptionRequest;
use App\DataTables\Skill\DescriptionDataTable;
use App\Models\Skill;
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

        // Course comment Table
        $vars['skillDescriptionTable'] = $dataTable->html();

        return view('skill.descriptionlist', $vars);
    }

    // Get course comment
    public function skillDescriptionTable(DescriptionDataTable $dataTable) {
        return $dataTable->render('skill.descriptionList');
    }

    
    // Store
    public function store(StoreDescriptionRequest $request) {

        Explanation::updateOrCreate(
            ['id' => $request->get('id')],
            ['explanation' => $request->get('description'), 'explainable_type' => Skill::class]
        );

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
