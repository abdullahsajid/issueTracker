<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\projects;
use App\Models\projissues;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class opertionControl extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        $cred = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($cred)){
            $request->session()->regenerate();
            return redirect('main');
        }
        return back()->withError("something wrong!");
    }

    public function register_view(){
        return view('auth.register');
    }
    
    public function register(Request $request){
        $val = $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users|email',
            'password'=>'required|between:8,255|confirmed',
            'password_confirmation'=>'required'
        ]);
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password)
        ]);
        
        
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect('main');
    }

    public function logout(Request $request){
        Session::flush();
        Auth::logout();
        return redirect()->route('loginUI');
    }

    public function mainPage(){
        return view('main');
    }

    public function issuePage(){
        return view('issue');
    }

    public function createProject(Request $req){
        $projectTitle = $req->get("projTitle");
        $projectType = $req->get("projType");
        $userId = Auth::user()->id;

        $projectModel = new projects;
        $projectModel->project_name = $projectTitle;
        $projectModel->project_type = $projectType;
        $projectModel->user_id = $userId;

        $projectModel->save();
        return redirect('main');
    }

    public function getUserProjects(Request $req){
        $userId = Auth::user()->id;
        $projects = projects::where('user_id',$userId)->get();
        return view('main',['projectDetail'=>$projects]);
    }

    public function issuePanel($projectTitle,$id){
        $assigneeNames = User::all();
        $issues = projissues::where('userIssue_id',$id)->get();
        return view('issue',['projTitle'=>$projectTitle,'projId'=>$id,'issues'=>$issues,'assigneeName'=>$assigneeNames]);
    }

    public function createIssues(Request $req,$id,$projectTitle){
        $projectId = $req->get('userProj_id');
        $projectName = $req->get('userProj_title');
        $issueTitle = $req->get('issueTitle');
        $issueDesc = $req->get('issuedesc');
        $pri = $req->get('priority');
        $assign = $req->get('assignee');
        $attach = $req->file('attachment')->getClientOriginalName();

        $create = new projissues;
        $create->issue_title = $issueTitle;
        $create->issue_desc = $issueDesc;
        $create->issue_priority = $pri;
        $create->issue_assign = $assign;
        
        if($req->hasFile('attachment')){
            $req->validate([
                'file'=>'mimes:jpeg,png,pdf,docx'
            ]);
        }
        $req->attachment->move(public_path('attachments'),$attach);
        $create->issue_attachment = $attach;
        $create->userIssue_id =  $projectId;
        $create->save();
        return redirect('issue/'.$projectName.'/'.$projectId);
    }

}
