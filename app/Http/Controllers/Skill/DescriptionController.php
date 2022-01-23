<?php

namespace App\Http\Controllers\Skill;

use Illuminate\Http\Request;
use App\Models\Explanation;
use App\Http\Controllers\Controller;
use App\DataTables\Skill\DescriptionDataTable;
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
    public function store(StoreCommentRequest $request) {

        DB::transaction(function() use($request) {

            $comment = Comment::create(['name' => $request->get('name'), 'comment' => $request->get('comment'), 
                'commentable_id' => $request->get('course_id'), 'commentable_type' => Course::class]);

            // Set the course's comment inactive
            $comment->statuses()->create(['status' => Status::INACTIVE]);

        });

        return $this->successfulResponse('دیدگاه مرتبط با دوره با موفقیت ثبت شد');
    }

    // Edit
    public function edit(Request $request) {
        $this->action->edit(Comment::class, $request->get('id')); 
    }

    // Update
    public function update(StoreCommentRequest $request) {

        $comment = Comment::where('id', $request->get('id'))->where('commentable_type', Course::class)
            ->update(['comment' => $request->get('comment')]);

        return $this->successfulResponse('دیدگاه مرتبط با دوره با موفقیت ویرایش شد');
    }

    // Delete
    public function delete($id) {
        return $this->action->delete(Explanation::class, $id);
    }

    // Comment submitted by admin to be shown for user
    public function submit(Request $request, CourseArticleAction $action) {
        // Set the course's comment visible
        return $action->comment($request->get('submission'));
    }

    // Details
    public function details(Request $request) {

        $vars['comment'] = Comment::find($request->get('id'));

        return view('course.comment.details', $vars);
    }

}
