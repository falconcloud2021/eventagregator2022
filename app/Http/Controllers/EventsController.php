<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\EventRequest;
use App\Models\Events;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class EventsController extends Controller
{
    public function index(): View
    {
        $events = Events::paginate(5);
        $eventsTop = Events::query()->orderBy('rating')->limit(5)->get();
        return view('admin.events', compact('events', 'eventsTop'));
    }

    public function show(Events $event): View
    {
        return view('events.event', compact('event'));
    }

    public function create(): View
    {
        return view('events.eventcreate');
    }

    public function edit(Events $event): View
    {
        return view('events.eventedit', compact('event'));
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Events::firstOrCreate($data);
        return redirect()->route('event.index');
    }

    public function update(EventRequest $request, Events $event): RedirectResponse
    {
        $data = $request->validated();
        $event->update($data);
        return redirect()->route('event.index');
    }

    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->route('event.index');

    }
}
