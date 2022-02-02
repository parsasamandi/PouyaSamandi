<?php

namespace App\Http\Controllers\Refree;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRefreeRequest;
use App\Providers\Action;
use App\DataTables\RefreeDataTable;
use App\Models\Refree;
use App\Models\Explanation;
use Illuminate\Http\Request;
use DB;

class RefreeController extends Controller
{
    public $action;

    public function __construct() {
        $this->action = new Action();
    }

    public $refree = '\App\Models\Refree';

    // Refree Table
    public function list(Request $request) {
        // DataTable
        $dataTable = new RefreeDataTable();

        $vars['refreeTable'] = $dataTable->html();

        $vars['explanation'] = Explanation::select('id', 'explanation')->get();

        return view('refree.list', $vars);
    }

    // DataTable
    public function refreeTable(RefreeDataTable $dataTable) {
        return $dataTable->render('refree.list');
    }

    // Store refree
    public function store(StoreRefreeRequest $request) {

        $button_action = $request->get('button_action');

        // Insert
        if($button_action == "insert") {

            $this->addSkill($request);

            $success_output = $this->getInsertionMessage();
        }
        // Update
        else if($button_action == "update") {

            $this->addSkill($request);

            $success_output = $this->getUpdateMessage();
        }

        return $this->getAction($button_action);
    }

    // Add Or Update Skill
    public function addSkill($request) {

        DB::transaction(function() use($request) {

            $id = $request->get('id');

            $refree = Refree::updateOrCreate(
                ['id' => $id],
                ['name' => $request->get('name'), 'link' => $request->get('link'), 'image' => $request->get('image')]
            );

            if($request->has('description') ) {
                $refree->explanations()->createOrUpdate(['id' => $id, 'explanation' => $request->get('description')]);
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
