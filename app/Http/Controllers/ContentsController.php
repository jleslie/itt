<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Content;

class ContentsController extends Controller
{
    private $pageTitle = 'Content Controller';

    /**
     * Show a listing of all content.
     */
    public function Index() {
        // Guard against creating or editing while not logged in
        if (!Auth::check()) {
            return view(
                'auth.login',
                [
                    'pageTitle' => 'Log in to continue'
                ]
            );
        }

        $content = Content::with('user')->get();
        return view(
            'content.index',
            [
                'contents' => $content, 
                'pageTitle' => $this->pageTitle
            ]
        );
    }
  
    /**
     * Edit a selected content, or prepare to create new content if argument is missing.
     *
     * @param int $id
     */
    public function Edit(int $id = null) {
        // Guard against creating or editing while not logged in
        if (!Auth::check()) {
            return view(
                'auth.login',
                [
                    'pageTitle' => 'Log in to continue'
                ]
            );
        }

        if ($id) {
            $content = Content::where('id', $id)->first();
        } else {
            $content = [];
        }

        $title = isset($id) ? 'Edit' : 'Create';
        return view(
            'content.edit',
            [
                'content' => $content,
                'pageTitle' => "$title Content"
            ]
        );
    }

    /**
     * Saves content to the database.  Depending on whether id is present or not,
     * save() will either update an existing record or create a new record in the database
     * 
     * @param Request $request
     */
    public function save(Request $request) {
        // Guard against creating or editing while not logged in
        if (!Auth::check()) {
            return view(
                'auth.login',
                [
                    'pageTitle' => 'Log in to continue'
                ]
            );
        }

        // Determine whether we are creating or updating
        $id = $request->input('id');
        if (!empty($id)) {
            $content = Content::find($id);
        } else {
            $content = new Content();
        }

        // Non-required field defaulting
        $type = $request->input('type');
        $filter = $request->input('filter');
        if (!empty($type)) {
            $content->type = $request->input('type');
        } else {
            $content->type = 'post';
        }

        if (!empty($filter)) {
            $content->filter = $request->input('filter');
        } else {
            $content->filter = 'plain';
        }

        // Required Fields
        $content->title = $request->input('title');
        $content->key = $request->input('key');
        $content->data = $request->input('data');
        $content->user_id = Auth::user()->id;

        $content->save();
        try {
            $content->save();
        }
        catch (\Exception $e) {
            return redirect('/content')->with('fail', "Something went wrong while saving your content.  Please try again later or contact support."); 
        }

        return redirect('/content')->with('success', "Your content was successfully saved!");
    }
    
    /**
     * Handles deleteing of items from the database
     * 
     * @param Request $request
     */
    public function delete(Request $request) {
        // Guard against creating or editing while not logged in
        if (!Auth::check()) {
            return view(
                'auth.login',
                [
                    'pageTitle' => 'Log in to continue'
                ]
            );
        }

        $id = $request->input('id');
        if (!empty($request->input('id'))) {
            try {
                Content::findOrFail($id)->delete();
            }
            catch(ModelNotFoundException $e) {
                return redirect('/content')->with('fail', "Something went wrong while trying to delete content #$id.  Please try again later or contact support."); 
            }

            return redirect('/content')->with('success', "Successfully deleted content #$id!");
        }

        return redirect('/content');
    }
  

    /**
     * Create new content.  This method simply points to the edit logic which handles both
     */
    public function Create() {
        return $this->Edit();
    }
}
