<?php

namespace App\Http\Controllers\Refree;

use Illuminate\Http\Request;
use App\Models\Explanation;
use App\Models\Refree;
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

        $vars['refrees'] = Refree::select('id', 'name')->get();

        return view('refree.descriptionlist', $vars);
    }

    // Get refree's comment
    public function refreeDescriptionTable(DescriptionDataTable $dataTable) {
        return $dataTable->render('refree.descriptionList');
    }

    
    // Store
    public function store(StoreDescriptionRequest $request) {

        Explanation::updateOrCreate(
            ['id' => $request->get('id')],
            ['explanation' => $request->get('description'), 'explainable_id' => $request->get('refree'),
            'explainable_type' => Refree::class]
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
