<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Agendamento;
use App\Sala;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


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
        //lista os prédios sem repeti-los
        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');
        $salas = Sala::all()->lists('numero', 'id');
        $profs = Professor::all()->lists('nome', 'id');
        $agendamentos = Agendamento::all()->jsonSerialize();

        $i = 0;
        foreach ($agendamentos as $agenda) {
            $agendamentos[$i]['tipo'] = utf8_encode($agenda['tipo']);
            $i++;
        }

        return view('agendamentos.index', compact('agendamentos', 'predios', 'salas', 'profs', 'agendamentos'));
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
        //não precisamos pegar predio_id pois já temos sala_id
        $input = $request->except('predio_id');

        //pega o ID do usuário logado que fez a reserva
        $user_id = Auth::id();
        $input['usuario_id'] = $user_id;

        $this->agendamentos->create($input);

        return redirect()->route('agendamentos.index');
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
        $agendaEdit = $this->agendamentos->find($id);

        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');
        $salas = Sala::all()->lists('numero', 'id');
        $profs = Professor::all()->lists('nome', 'id');

        if (is_null($agendaEdit))
        {
            return redirect()->route('agendamentos.index');
        }

        return view('agendamentos.edit', compact('agendaEdit', 'predios', 'salas', 'profs'));
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
        $input = $request->all();
        $agenda = $this->agendamentos->find($id);

        //$agenda->update($input);

        return redirect()->route('agendamentos.index');
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
