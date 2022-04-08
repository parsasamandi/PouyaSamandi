<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDescriptionRequest;
use App\Providers\Action;
use App\DataTables\Experience\DescriptionDataTable;
use App\Models\Explanation;
use App\Models\Experience;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public $action;

    public function __construct()
    {
        $this->action = new Action();
    }

    // Experience Table
    public function list(Request $request)
    {
        // DataTable
        $dataTable = new DescriptionDataTable();

        $vars['experienceDescriptionTable'] = $dataTable->html();

        $vars['experiences'] = Experience::select('id', 'headline')->get();

        return view('experience.descriptionList', $vars);
    }

    // DataTable
    public function experienceDescriptionTable(DescriptionDataTable $dataTable)
    {
        return $dataTable->render('experience.descriptionList');
    }

    // Store experience
    public function store(StoreDescriptionRequest $request)
    {

        Explanation::updateOrCreate(
            ['id' => $request->get('id')],
            ['explanation' => $request->get('description'), 'explainable_id' => $request->get('experience'),
            'explainable_type' => Experience::class]
        );

        return $this->getAction($request->get('button_action'));
    }

    // Edit
    public function edit(Request $request)
    {
        return $this->action->edit(Explanation::class, $request->get('id'));
    }

    // Delete
    public function delete($id)
    {
        return $this->action->delete(Explanation::class, $id);
    }
}
