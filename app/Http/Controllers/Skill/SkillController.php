<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSkillRequest;
use App\Providers\Action;
use App\DataTables\Skill\SkillDataTable;
use App\Models\Explanation;
use App\Models\Skill;
use DB;

class SkillController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    public $skill = '\App\Models\Skill';

    // Skill Table
    public function list(Request $request) {
        // DataTable
        $dataTable = new SkillDataTable();

        $vars['skillTable'] = $dataTable->html();

        return view('skill.list', $vars);
    }

    // DataTable
    public function skillTable(SkillDataTable $dataTable) {
        return $dataTable->render('skill.list');
    }

    // Store Skill
    public function store(StoreSkillRequest $request) {

        DB::transaction(function() use($request) {

            $id = $request->get('id');

            $skill = Skill::updateOrCreate(
                ['id' => $id],
                ['title' => $request->get('title')]
            );

            if($request->has('descriptions')) {

                foreach($request->get('descriptions') as $description) {
                    // Skill's descriptions
                    $skill->explanations()->updateOrCreate(['explainable_id' => $id, 'explanation' => $description]);
                }
            }
        });

        return $this->getAction($request->get('button_action'));
    }
    
    // Edit
    public function edit(Request $request) {
        return $this->action->editWithDescription($this->skill, $request->get('id'));
    }

    // Delete
    public function delete($id) {
        return $this->action->delete($this->skill, $id);
    }
}
