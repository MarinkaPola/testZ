<?php

namespace App\Http\Controllers;


use App\Http\Requests\BirdRequest;
use App\Models\Bird;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;



class BirdController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $birds = Bird::paginate();
        return View('birds.birds')->with('birds', $birds);
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function create()
    {
        return View('birds.bird_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BirdRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(BirdRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var Bird $bird */
        $bird = $user->birds()->create($request->only('title', 'text', 'image', 'url', 'active', 'sort_order'));


        return redirect(route('birds.show', $bird->id));
    }

    /**
     * Display the specified resource.
     * @throws AuthorizationException
     * @param Bird $bird
     * @return Factory|View
     */
    public function show(Bird $bird)
    {
        $this->authorize('show', $bird);

        return View('birds.bird')->with('bird', $bird);
    }

    /**
     * Display the specified resource.
     *
     * @param Bird $bird
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Bird $bird)
    {
        $this->authorize('update', $bird);

        return View('birds.bird_edit', compact('bird'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BirdRequest $request
     * @param Bird $bird
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function update(BirdRequest $request, Bird $bird)
    {
        $this->authorize('update', $bird);

        $bird->update($request->only('title', 'text', 'image', 'url', 'active', 'sort_order'));

        return redirect(route('birds.show', $bird->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Bird $bird
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function destroy(Bird $bird)
    {
        $this->authorize('destroy', $bird);

        $bird->delete();

        return redirect('/');
    }

}
