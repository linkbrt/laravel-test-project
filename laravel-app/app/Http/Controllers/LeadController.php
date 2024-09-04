<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Status;

class LeadController extends Controller
{
    // Показать список лидов
    public function index()
    {
        $leads = Lead::with('status')->get();
        $statuses = Status::all();
        $totalLeads = $leads->count();
        $leadsByStatus = Lead::selectRaw('status_id, count(*) as total')
                              ->groupBy('status_id')
                              ->pluck('total', 'status_id');

        return view('leads.index', compact('leads', 'statuses', 'totalLeads', 'leadsByStatus'));
    }

    // Обновить статус лида
    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status_id' => 'required|exists:statuses,id',
        ]);

        $lead->update(['status_id' => $request->status_id]);

        return redirect()->route('leads.index')->with('success', 'Статус лида обновлен.');
    }

    // Удалить лида
    public function destroy(Lead $lead)
    {
        $lead->delete();

        return redirect()->route('leads.index')->with('success', 'Лид удален.');
    }

    // Редактирование лида
    public function edit(Lead $lead)
    {
        $statuses = Status::all();

        return view('leads.edit', compact('lead', 'statuses'));
    }

    // Обновить данные лида
    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:leads,email,' . $lead->id,
            'phone' => 'required|string|max:20',
            'status_id' => 'required|exists:statuses,id',
        ]);

        $lead->update($request->all());

        return redirect()->route('leads.index')->with('success', 'Данные лида обновлены.');
    }
}
