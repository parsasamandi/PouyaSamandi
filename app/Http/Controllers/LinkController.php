<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Providers\SuccessMessages;
use App\Providers\Action;
use App\Models\Link;
use App\Models\Description;
use App\DataTables\LinkDataTable;

class LinkController extends Controller
{   
    // Link Table
    public function list(Request $request) {
        // DataTable
        $dataTable = new LinkDataTable();

        $vars['linkTable'] = $dataTable->html();

        // Descriptions
        $descriptions = Description::select('id','desc')->get();

        return view('link.linkList', $vars, compact('descriptions'));
    }

    // DataTable
    public function linkTable(LinkDataTable $dataTable) {
        return $dataTable->render('linkList');
    }

    // Stroing Link
    public function store(Request $request,SuccessMessages $message)
    {
        $validation = Validator::make($request->all(), [
            'text' => 'required',
            'link' => 'required',
            'description' => 'required'
        ]);

        $error_array = array();
        $success_output = '';
        
        // Validation
        if($validation->fails()) {
            foreach($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        }
        else {
            // Insert
            if($request->get('button_action') == "insert") {
                $this->addLink($request);
                $success_output = $message->getInsert();
            }
            // Update
            else if($request->get('button_action') == "update") {
                $this->addLink($request);
                $success_output = $message->getUpdate();
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        return json_encode($output);
    }

    // Insert Link
    public function addLink($request) {
        // Edit
        $link = Link::find($request->get('id'));
        if(!$link) {
            // Insert
            $link = new Link();
        }

        $link->text = $request->get('text');
        $link->link = $request->get('link');
        $link->desc_id = $request->get('description');

        $link->save();
    }

    // Edit Link Page
    public function edit(Request $request,Action $action) {
        return json_encode($action->edit('\App\Models\Link',$request->get('id')));
    }

    // Delete Link
    public function delete($id)
    {
        $link = Link::where('id', $id);
        if($link) {
            $link->delete();
        }
        else {
            return response()->json([],404);
        }
        return response()->json([],200);
    }

    // Description Detials of Link
    public function eachDesc(Request $request) {
        $link = Link::find($request->get('id'));
        return view('link.eachDesc', compact('link'));
    }


    
}
