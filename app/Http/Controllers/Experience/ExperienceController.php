<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExperienceRequest;
use App\Providers\Action;
use App\DataTables\Experience\ExperienceDataTable;
use App\Models\Experience;
use Illuminate\Http\Request;
use File;
use DB;

class ExperienceController extends Controller
{
    public $action;

    public function __construct()
    {
        $this->action = new Action();
    }

    public $experience = Experience::class;

    // Experience Table
    public function list(Request $request)
    {
        // DataTable
        $dataTable = new ExperienceDataTable();

        $vars['experienceTable'] = $dataTable->html();

        return view('experience.list', $vars);
    }

    // DataTable
    public function experienceTable(ExperienceDataTable $dataTable)
    {
        return $dataTable->render('experience.list');
    }

    // Store experience
    public function store(StoreExperienceRequest $request)
    {
        DB::transaction(function() use($request) {

            $id = $request->get('id');

            $experience = Experience::updateOrCreate(
                ['id' => $id], ['headline' => $request->get('headline')]
            );

            if($request->has('descriptions')) {

                foreach($request->get('descriptions') as $description) {
                    // Experience's descriptions
                    $experience->explanations()->updateOrCreate(['explainable_id' => $id], ['explanation' => $description]);
                }
            }
        });

        return $this->getAction($request->get('button_action'));

    }

    // Edit
    public function edit(Request $request)
    {
        return $this->action->edit($this->experience, $request->get('id'));
    }

    // Delete
    public function delete($id)
    {
        return $this->action->delete($this->experience, $id);
    }
}
