<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Agendamento;
use App\Sala;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class AgendamentosController extends Controller
{
    protected $agendamentos;

    public function __construct(Agendamento $agendamentos)
    {
        $this->agendamentos = $agendamentos;
        $this->middleware('auth');
    }


    public function index()
    {
        $agendamentos = $this->agendamentos->all();

        //lista os prédios sem repeti-los
        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');
        $salas = Sala::all()->lists('numero', 'numero');

        return view('agendamentos.index', compact('agendamentos', 'predios', 'salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->index();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
