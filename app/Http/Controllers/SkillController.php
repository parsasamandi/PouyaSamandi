<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreSkillRequest;
use App\Providers\Action;
use App\DataTables\SkillDataTable;
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

        $vars['descriptions'] = Explanation::select('id', 'explanation')->get();

        return view('skill.list', $vars);
    }
    // DataTable
    public function skillTable(SkillDataTable $dataTable) {
        return $dataTable->render('skill.list');
    }

    // Store Skill
    public function store(StoreSkillRequest $request) {

        // Insert
        if($request->get('button_action') == "insert") {

            $this->addSkill($request);

            $success_output = $this->getInsertionMessage();
        }
        // Update
        else if($request->get('button_action') == "update") {

            $this->addSkill($request);

            $success_output = $this->getUpdateMessage();
        }

        return $this->getAction($request->get('button_action'));
    }

    // Add Or Update Skill
    public function addSkill($request) {

        DB::transaction(function() use($request) {

            // Edit
            $skill = Skill::find($request->get('id'));

            if(!$skill) {
                // Insert
                $skill = new Skill();
            }

            $skill->title = $request->get('title');
            $skill->save();

            if($request->get('descriptions') != null) {

                foreach($request->get('descriptions') as $description) {
                    // Skill's descriptions
                    $skill->explanations()->create(['explanation' => $description]);
                }
            }
            
        });

    }

    // Edit
    public function edit(Request $request) {

        $skill = Skill::where('id', $request->get('id'))->with('explanations')->first();
        return response()->json($skill);
    }

    // Delete
    public function delete($id) {
        return $this->action->delete($this->skill, $id);
    }
}
