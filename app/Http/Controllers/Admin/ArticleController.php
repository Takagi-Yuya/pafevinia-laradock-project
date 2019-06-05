<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aticle;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;

class AticleController extends Controller
{
    public function add()
    {
        return view('admin.aticle.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Aticle::$rules);
        $aticles = new Aticle;
        $user = Auth::user();
        $aticles->user_id = $user->id;
        $form = $request->all();

        unset($form['_token']);

        $aticles->fill($form)->save();

        return redirect('admin/admin_home');
    }

    public function edit(Request $request)
    {
        $aticle = Aticle::where('id', $request->id)->first();

        return view('admin.aticle.edit', ['aticle_form' => $aticle]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Aticle::$rules);

        $aticle = Aticle::where('id', $request->id)->first();
        $aticle_form = $request->all();

        unset($aticle_form['_token']);

        $aticle->fill($aticle_form)->save();

        return redirect('admin/admin_home');
    }

    public function delete(Request $request)
    {
        $aticle = Aticle::where('id', $request->id)->delete();

        return redirect('admin/admin_home');
    }
}
