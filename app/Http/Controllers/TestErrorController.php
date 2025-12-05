<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestErrorController extends Controller
{
    public function test404()
    {
        abort(404, 'Custom 404 message from controller');
    }
    
    public function test500()
    {
        abort(500, 'Custom 500 message from controller');
    }
    
    public function test403()
    {
        abort(403, 'Custom 403 message from controller');
    }
    
    public function testJson404(Request $request)
    {
        if ($request->expectsJson()) {
            abort(404, 'JSON 404 error response');
        }
        
        abort(404, 'Regular 404 error');
    }
    
    public function testJson500(Request $request)
    {
        if ($request->expectsJson()) {
            abort(500, 'JSON 500 error response');
        }
        
        abort(500, 'Regular 500 error');
    }
}