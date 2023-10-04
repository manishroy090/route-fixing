<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    private $default_pagination;

    public function __construct(){
        $this->default_pagination = 25;
    }

    public function index(Request $request){
        $roles = Role::orderBy("created_at","DESC")->paginate($this->default_pagination);
        return view("backend.roles.index",compact("roles"));
    }

    public function create(Request $request){
        
    }

    public function store(Request $request){
        
    }

    public function edit(Request $request, $id){
        
    }

    public function update(Request $request, $id){
        
    }
}
