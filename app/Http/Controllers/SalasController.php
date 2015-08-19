<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sala;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SalasController extends Controller
{

    protected $salas;

    public function __construct(Sala $sala) {
        $this->salas = $sala;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salas = $this->salas->all();

        return view('salas.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $this->salas->create($input);

        return redirect()->route('salas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $salaEdit = $this->salas->find($id);

        if (is_null($salaEdit))
        {
            return redirect()->route('salas.index');
        }

        return view('salas.edit', compact('salaEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_method', '_token');
        $sala = $this->salas->find($id);
        $sala->update($input);

        return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->salas->find($id)->delete();

        return redirect()->route('salas.index');
    }
}
