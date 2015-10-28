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

    private function getHours()
    {
        //cria um array de horas e coloca os horarios das 07:00 até as 22:00 com intervalo de 30 min
        $horas = array();

        for($i = 7; $i <= 22; $i++ )
        {
            if($i < 10)
            {
                $horas = array_add($horas, "0$i:00", "0$i:00");
                $horas = array_add($horas, "0$i:30", "0$i:30");
            } else
            {
                $horas = array_add($horas, "$i:00", "$i:00");
                $horas = array_add($horas, "$i:30", "$i:30");
            }
        }
        //remove o ultimo valor do array, que nesse caso é a hora 22:30
        array_pop($horas);

        return $horas;
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

        $horas = $this->getHours();

        return view('agendamentos.index', compact('agendamentos', 'horas', 'predios', 'salas', 'profs'));
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

        if (is_null($agendaEdit))
        {
            return redirect()->route('agendamentos.index');
        }

        $agendaEdit['predio'] = DB::table('salas')->where('id', $agendaEdit->sala_id)->value('predio');
        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');
        $salas = Sala::all()->lists('numero', 'id');
        $profs = Professor::all()->lists('nome', 'id');

        //cria uma nova data com o dia resgatado do banco que esta no formato YYYY-MM-DD
        $dia = date_create($agendaEdit->dia);
        //formata a nova data para dd/mm/yyyy
        $agendaEdit->dia = date_format($dia, 'd/m/Y');

        //retorna apenas os 5 primeiros caracteres
        //original 14:30:00 => retorna 14:30
        $agendaEdit->hora_inicio = substr($agendaEdit->hora_inicio, 0, 5);
        $agendaEdit->hora_fim = substr($agendaEdit->hora_fim, 0, 5);

        $horas = $this->getHours();

        return view('agendamentos.edit', compact('agendaEdit', 'horas', 'predios', 'salas', 'profs'));
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
