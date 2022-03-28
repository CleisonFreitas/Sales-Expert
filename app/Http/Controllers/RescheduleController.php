<?php

namespace App\Http\Controllers;

use App\Models\Reschedule;
use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RescheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $reagendados = Reschedule::all();

        }catch(\Exception $ex){
            return redirect()->back()->with([toast()->error($ex->getMessage())]);
        }

        return $reagendados;
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
        try{
            DB::beginTransaction();

            $reschedule = Reschedule::create($request->all());

            $agendados = CustomerService::Where('ordem',$request->cliente_ordem)
            ->update([
                'data_agend' => $request->data,
                'hora_agend' => $request->hora,
                'status' => 'R'
            ]);


        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with([toast()->error($ex->getMessage())]);

        }
        DB::commit();
        return redirect()->back()->with([toast()->success('Reagendamento realizado com sucesso!')]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reschedule  $reschedule
     * @return \Illuminate\Http\Response
     */
    public function show(Reschedule $reschedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reschedule  $reschedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Reschedule $reschedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reschedule  $reschedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reschedule $reschedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reschedule  $reschedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reschedule $reschedule)
    {
        //
    }
}
