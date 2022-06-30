<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\AdminDataTable;
use Illuminate\Http\Request;
use App\Providers\SuccessMessages;
use App\Http\Requests\StoreAdminRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Admin Table 
    public function list() {
        // DataTable
        $dataTable = new AdminDataTable();

        // Admin Table
        $vars['adminTable'] = $dataTable->html();

        return view('adminList', $vars);
    }

    // Get Admin
    public function adminTable(AdminDataTable $dataTable) {
        return $dataTable->render('adminList');
    }

    // Store Admin
    public function store(StoreAdminRequest $request,SuccessMessages $message) {
        // Insert
        if($request->get('#button_action') == "insert") {
            $this->newAdmin($request);
            $success_output = $message->getInsert();
        }
        // Update
        else if($request->get('#button_action') == "update") {
            $this->newAdmin($request);
            $success_output = $message->getUpdate();
        }

        $output = array('success' => $success_output);

        return json_encode($output);
    }

    // Add Or Update Admin
    public function addAdmin($request) {
        // Edit
        $admin = User::find($request->get('id'));
        if(!$admin) {
            // Insert
            $admin = new User();
        }
        $admin->name = $request->get('name');
        $admin->email = $request->get('email');
        if($request->get('password') != 'رمز عبور جدید' and $request->get('password') != 'تکرار رمز عبور جدید') {
            $admin->password = Hash::make($request->get('password'));
        }

        $admin->save();
    }

    // Delete Each Admin
    public function delete(Request $request, $id) {
        $admin = User::find($id);
        if($admin) {
            $admin->delete();
        }
        else {
            return response()->json([], 404);
        }
        return response()->json([], 200);
    }

    // Edit Admin
    public function edit(Request $request) {
        $admin = User::findOrFail($request->get('id'));
        return json_encode($admin);
    }

    // Show
<<<<<<< HEAD
    public function adminHome() {
        return view('adminHome');
=======
    public function admin() {
        return view('admin/home');
>>>>>>> Database .sql file is added to the project
    }

    // Logout
    public function logout(Request $request) {
        Auth::logout();
        return redirect('login/login');
    }
    
    
}
