<?php 

namespace App\Http\Responses;
 
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
 
class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $redirectTo;

        $role = auth()->user()->getRoleNames()->first();

        if($role === 'user' || !$role){
            $redirectTo = '/';
        }else {
            $redirectTo = '/admin/dashboard';
        }
 
        return redirect()->intended($redirectTo);
    }
}