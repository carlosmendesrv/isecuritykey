<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TfaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $google2fa = new Google2FA();
        $user = Auth::user();

        $code = $user->token_tfa ?? $google2fa->generateSecretKey();
        $user->update(['token_tfa' => $code]);

        $qrCode = $google2fa->getQRCodeUrl(
            'Bitseller',
            'contato@bitseller.com.br',
            $code
        );

        $renderer = new ImageRenderer(
            new RendererStyle(200, 0),
            new ImagickImageBackEnd()
        );

        $writer = new Writer($renderer);
        $qrCode = base64_encode($writer->writeString($qrCode));

        $data = array(
            'user' => auth()->user(),
            'secret' => '',
            'google2fa_url' => $code
        );

        return view('admin.2fa.edit', compact('user', 'data', 'qrCode', 'code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['code' => 'required']);

        if (!validateTfa($request->get('code'))) {
            session()->flash('status', 'danger');
            session()->flash('message', 'Código validado com sucesso.');
            return redirect()->back()->with("error", "Erro ao validar código.");
        }

        auth()->user()->update(['status_tfa' => true]);
        session()->flash('status', 'success');
        session()->flash('message', 'Código validado com sucesso.');

        return redirect()->back()->with('success', "Código validado com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
