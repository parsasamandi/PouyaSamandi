<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreSkillRequest;
use App\Providers\Action;
use App\Providers\SuccessMessages;
use App\DataTables\SkillDataTable;
use App\Models\Description;
use App\Models\Experience;
use App\Models\Skill;

class SkillController extends Controller
{
    public $skill = '\App\Models\Skill';

    // Skill Table
    public function list(Request $request) {
        // DataTable
        $dataTable = new SkillDataTable();

        $vars['skillTable'] = $dataTable->html();

        $vars['descriptions'] = Description::select('id', 'description')->get();

        return view('skill.list', $vars);
    }
    // DataTable
    public function skillTable(SkillDataTable $dataTable) {
        return $dataTable->render('skill.list');
    }

    // Store Skill
    public function store(StoreSkillRequest $request, SuccessMessages $message) {

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

        return json_encode(array('message' => $success_output));
    }

    // Add Or Update Skill
    public function addSkill($request) {

        foreach($request->get('descriptions') as $description) {
            // Edit
            $skill = Skill::find($request->get('id'));
            if(!$skill) {
                // Insert
                $skill = new Skill();
            }

            $skill->title = $request->get('title');
            $skill->save();

            // Skill's descriptions
            $skill->descriptions()->create(['description' => $description]);
        }
    }

  // Add Or Update Skill's description
  public function storeDescription(Request $request, SuccessMessages $message) {
    // Insert
    $description = new Description();
    $description->description = $request->get('description');   
    $description->save();

    return json_encode(array('success' => $this->getInsertionMessage()));
}

    // Edit
    public function edit(Action $action, Request $request) {
        return Skill::where('id', $request->get('id'))->with('descriptions')->first();
    }
    // Delete
    public function delete(Action $action,$id) {
        return $action->delete($this->skill, $id);
    }
}
