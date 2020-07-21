<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use App\Http\Requests\WorkerRequest;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkerRequest $request)
    {
        $worker = Worker::create($request->all());

        $worker->save();

        return redirect()
                ->route('home')
                ->with('success', 'Работник успешно добавлен !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        return view('show', compact('worker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function update(WorkerRequest $request, Worker $worker)
    {
        $worker->name = $request->get('name');
        $worker->surname = $request->get('surname');
        $worker->profession = $request->get('profession');
        $worker->experience = $request->get('experience');
        $worker->salary = $request->get('salary');

        $worker->save();

        return redirect()
                ->route('home')
                ->with('success', 'Информация о работнике успешно отредактирована !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Worker  $worker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()
                ->route('home')
                ->with('success', 'Работник успешно удалён !');
    }
}
